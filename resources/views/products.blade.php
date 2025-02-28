@extends('includes.layouts.app')
@section('title','Laravel php assignment')
    
@section('main-content')
<div class="container mt-5">
    <h2 class="mb-4">Manage Product</h2>

    <form id="addProductForm">
        <input type="hidden" id="productId"> 
        <div class="mb-3">
            <input type="text" id="name" class="form-control" placeholder="Product Name" required>
        </div>
        <div class="mb-3">
            <input type="number" id="price" class="form-control" placeholder="Price" required>
        </div>
        <div class="mb-3">
            <input type="number" id="stock" class="form-control" placeholder="Stock" required>
        </div>
        <button type="submit" class="btn btn-primary" id="submitButton">Add Product</button>
    </form>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="productList">
        </tbody>
    </table>
</div>
@endsection
