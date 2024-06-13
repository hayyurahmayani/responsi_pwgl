@extends('layouts.template')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="card-title">Data Mahasiswa</h3>
        </div>
        <div class="card-body">
        <table class = "table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Hayyu</td>
            <td>A</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Wulan</td>
            <td>B</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Edra</td>
            <td>A</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Finnie</td>
            <td>A</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Dini</td>
            <td>B</td>
        </tr>
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection