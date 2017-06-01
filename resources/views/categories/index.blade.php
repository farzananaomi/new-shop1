

@extends('layouts.base')

@section('content')
    <div class="card ">
        <div class="header">
            <h4 class="title inline-block">Listing categories</h4>

            <div class="pull-right">
                <a href="#" class="btn btn-danger btn-fill" data-toggle="modal" data-target="#operation-modal">Add
                    Category</a>
            </div>
        </div>
        <div class="content">
            <div class="table-full-width">
                <table class="table" id="categories-table">
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="parent-row">
                            <td>
                                <p class="title">{{ $category->name }}</p>
                                <p class="category">{{ $category->description or '---' }}</p>
                            </td>
                            {{--<td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs"
                                        data-toggle="modal" data-target="#edit-modal"
                                        data-action="{{ route('categories.update', $category->id) }}"
                                        data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}"
                                        data-description="{{ $category->description }}"
                                        data-type="{{ $category->type }}"
                                        data-parent_id="{{ $category->parent_id }}"
                                        data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                --}}{{--<button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"--}}{{--
                                --}}{{--data-original-title="Remove">--}}{{--
                                --}}{{--<i class="fa fa-times"></i>--}}{{--
                                --}}{{--</button>--}}{{--
                            </td>--}}
                        </tr>

                        @foreach($category->subCategories as $category)
                            <tr class="child-indent">
                                <td>
                                    <p class="title">{{ $category->name }}</p>
                                    <p class="category">{{ $category->description or '---' }}</p>
                                </td>
                                {{--<td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs"
                                            data-toggle="modal" data-target="#edit-modal"
                                            data-action="{{ route('categories.update', $category->id) }}"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}"
                                            data-description="{{ $category->description }}"
                                            data-type="{{ $category->type }}"
                                            data-parent_id="{{ $category->parent_id }}"

                                            data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    --}}{{--<button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"--}}{{--
                                    --}}{{--data-original-title="Remove">--}}{{--
                                    --}}{{--<i class="fa fa-times"></i>--}}{{--
                                    --}}{{--</button>--}}{{--
                                </td>--}}
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">

            {{--<hr>--}}
            {{--<div class="stats">--}}
            {{--<i class="fa fa-history"></i> Updated 3 minutes ago--}}
            {{--</div>--}}
        </div>

    </div>

    <div class="modal fade" id="operation-modal" tabindex="-1" role="dialog"
         aria-labelledby="operation-form-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="operation-form-title">
                        Add new Category</h4>
                </div>
                <form role="form" action="{{ route('categories.store') }}" method="post" id="operation-form">
                {!! csrf_field() !!}
                <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name"
                                   name="name" placeholder="Enter CategoryName" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description"
                                      name="description"></textarea>
                        </div>

                        <hr>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="type" value="sub-operation"> Sub-operation
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Main Category</label>
                            <select class="form-control select2" id="parent_id"
                                    name="parent_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-default btn-fill">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--   <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog"
            aria-labelledby="operation-form-title" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <!-- Modal Header -->
                   <div class="modal-header">
                       <button type="button" class="close"
                               data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                       </button>
                       <h4 class="modal-title" id="operation-form-title">
                           Edit Category</h4>
                   </div>
                   <form role="form" action="{{ route('categories.update', 0) }}" method="post" id="edit-operation-form">
                   {!! csrf_field() !!}
                   {!! method_field('PUT') !!}
                   <!-- Modal Body -->
                       <div class="modal-body">
                           <div class="form-group">
                               <label for="edit-name">Name</label>
                               <input type="text" class="form-control" id="edit-name"
                                      name="name" placeholder="Enter CategoryName" required="required"/>
                           </div>
                           <div class="form-group">
                               <label for="edit-description">Description</label>
                               <textarea class="form-control" id="edit-description"
                                         name="description"></textarea>
                           </div>
                           <hr>
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox" name="type" value="sub-operation"> Sub-operation
                               </label>
                           </div>
                           <div class="form-group">
                               <label for="edit-parent_id">Main Category</label>
                               <select class="form-control select2" id="edit-parent_id"
                                       name="parent_id">
                                   @foreach($categories as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                       <!-- Modal Footer -->
                       <div class="modal-footer">
                           <button type="button" class="btn btn-default"
                                   data-dismiss="modal">
                               Close
                           </button>
                           <button type="submit" class="btn btn-default btn-fill">Submit</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>--}}

@endsection

@push('styles')
<style>
    #categories-table tr td:first-of-type {
        padding-left: 25px;
    }

    .child-indent > td:first-of-type {
        padding-left: 60px !important;
    }

    .parent-row {
        background-color: #f2f2f2;
    }
</style>
@endpush

@push('scripts')
<script>
    $('#edit-modal').on('show.bs.modal', function (e) {
        //get data-id attribute of the clicked element
        let btn = $(e.relatedTarget);
        let action = btn.data('action');
        let name = btn.data('name');
        let description = btn.data('description');
        let type = btn.data('type');
        let parent_id = btn.data('parent_id');
        let questionId = $(e.relatedTarget).data('question-id');
        let submissionId = $(e.relatedTarget).data('submission-id');
        $(e.currentTarget).find('#edit-operation-form').attr('action', action);
        $(e.currentTarget).find('#edit-name').val(name);
        $(e.currentTarget).find('#edit-description').val(description);
        $(e.currentTarget).find('#edit-parent_id').val(parent_id).trigger('change');

        $(e.currentTarget).find('[name="type"]').prop('checked', type == 'sub-category');
    });
</script>
@endpush
