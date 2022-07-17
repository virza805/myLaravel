@extends('layouts.backend_master')

@section('title', 'Category')

@section('master_content')

<div class="row">
    <div class="col-md-8 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-info">Manage Category</h3>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <tbody id="catTbody"></tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
   <!-- {{-- the end category data show --}} -->
   <div class="col-md-4 mt-3">
       <div class="card">
           <div class="card-header">
               <h3 class="text-info">Add Category</h3>
           </div>
           <div class="card-body">
               <form action=""  method="POST" id="addCategoryForm">
                   <div class="form-group">
                       <input type="text" class="form-control" id="name" placeholder="Category Name">
                       <span class="text-danger" id="catNameError"></span>
                   </div>
                   <div class="form-group">
                       <input type="file" class="form-control" name="image" id="image">
                       <span class="text-danger" id="catImageError"></span>
                   </div>
                   <div class="form-group">
                       <button class="btn btn-sm btn-success btn-block"><i class="fa fa-plus"></i> Add New Category</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>

<!-- Button trigger modal -->
  <!--View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="tbody">
              <tbody id="viewCatTbody">

              </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="editDataForm" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit_name">
                            {{-- <input type="hidden" class="form-control" id="edit_id"> --}}
                            <span class="text-danger" id="catNameError"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit_slug">
                            <span class="text-danger" id="catNameError"></span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-sm btn-success btn-block"><i class="fa fa-plus"></i>Update Category</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>

        const getAllCategory = async () => {
            let url = `${admin_base_url}/category/all`
            const {data} = await axios.get(url)
            table_data_show(data)
        }
        getAllCategory()

        const table_data_show = (items) => {
            let loop = items.map((item, index) => {
                return `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td><img src="${item.image}" alt=""></td>
                    <td class="text-center">
                        <a href="" class="btn btn-sm btn-success" data-id="${item.slug}" data-toggle="modal" data-target="#viewModal" id="viewRow"><i class="fa fa-eye"></i></a>

                        <a href="" class="btn btn-sm btn-info" data-id="${item.slug}" data-toggle="modal" data-target="#editCatModal" id="editRow"><i class="fa fa-edit"></i></a>

                        <a href="" id="deleteRow" class="btn btn-sm btn-danger" data-id="${item.slug}"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                `
            });
            loop = loop.join("")
            const tbody = $('#catTbody')
            tbody.html(loop)
            // log(tbody);
        }

        // store
        $('#addCategoryForm').on('submit', function(e) {
            e.preventDefault();
            let name = $('#name')
            // let slug = $('#slug')
            let catNameError = $('#catNameError')
            catNameError.text("")

            if (name.val() === '') {
                catNameError.text("Filed must not be empty!")
                return
            }
            let data = {
                name: name.val(),
                // category_id: category_id.val()
            }
            let url = `${admin_base_url}/category/store`
            axios.post(url, data)
                .then(res => {
                    getAllCategory();
                    name.val('');
                    // category_id.val('');
                    setSuccessAlert(res.data.mgs)
                }).catch(err => {
                    if (err.response.data.errors.name) {
                        catNameError.text(err.response.data.errors.name[0])

                    }

                })
        });

        // view

        $('body').on('click', '#viewRow', function(){
            let id = $(this).data('id');

            let url = `${admin_base_url}/category/${id}`

            axios.get(url).then(res => {
                let response = `
                <tr>
                    <th>Name</th>
                    <th>${res.data.name}</th>
                </tr>
                <tr>
                    <th>Image</th>
                    <th><img src="${res.data.name}" alt=""></th>
                </tr>
                `
                let tby = $('#viewCatTbody')
                tby.html(response)
            })
        });

        // Delete
        $('body').on('click', '#deleteRow', function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if(result.isConfirmed) {
                    let slug = $(this).attr('data-id');
                    const url = `${admin_base_url}/category/${slug}`;
                    axios.delete(url)
                    .then(res => {
                        getAllCategory();
                    })
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted',
                        'success'
                    )
                }else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        })


        // edit
        $('body').on('click', '#editRow', function(e) {
            e.preventDefault()
            let slug = $(this).attr('data-id');
            const url = `${admin_base_url}/category/${slug}`;
            axios.get(url)
                .then(res => {
                    let {
                        data
                    } = res;
                    // let form = $('#editDataForm');
                    $('#edit_name').val(data.name)
                    $('#edit_slug').val(data.slug)
                    // $('#edit_id').val(data.id)
                    // console.log(data);
                });
        });

        // Update
        $('body').on('submit', '#editDataForm', function(e) {
            e.preventDefault()
            let name = $('#edit_name').val()
            let slug = $('#edit_slug').val()
            let url = `${admin_base_url}/category/update/${slug}`

            axios.post(url, {
                name,
                slug
            }).then(res => {

                setSuccessAlert('Data Update Successfully!')
                $('#editCatModal').modal('toggle')
            }).catch(err => {

            })
        })

    </script>
@endpush


