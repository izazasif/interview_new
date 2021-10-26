@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>


    <div class="card">
        <form action="{{route('product.show',1)}}" method="get" class="card-header">
            <div class="form-row justify-content-between">
                <div class="col-md-2">
                    <input type="text" name="title" placeholder="Product Title" class="form-control">
                </div>
                <div class="col-md-2">
                    <select name="variant" id="" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($data1 as $var)
                     <option>{{$var->variant}}</option>
                     @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price Range</span>
                        </div>
                        <input type="text" name="price_from" aria-label="First name" placeholder="From" class="form-control">
                        <input type="text" name="price_to" aria-label="Last name" placeholder="To" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" placeholder="Date" class="form-control">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        @php  $count =1;  @endphp
        <div class="card-body">
            <div class="table-response">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if ($data->count() == 0)
        <tr>
            <td colspan="5">No products to display.</td>
        </tr>
        @endif  
                    @foreach( $data as $var )
                    <tr>
                        <td><?=$count++?></td>
                        <td>{{$var->title}}</td>
                        <td>{{$var->description}}</td>
                        <td>
                            variant:{{$var->variant}}
                            price:{{$var->price}}
                            Stock:{{$var->stock}}
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('product.edit',$var->id) }}" class="btn btn-success">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
             <div class="row justify-content-between">
                <div class="col-md-6">
                    <p>Showing 1 to {{ $data->count() }} out of {{ $data->count() }}</p>
                </div>
                <div class="col-md-2">
                 {{ $data->links() }}
                </div>
            </div>
        </div>
            </div>
            

        </div>

    </div>

@endsection
