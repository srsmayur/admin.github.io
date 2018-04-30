@extends('layouts.app')

@section('content')
    <section id="container" class="">
        @include('layouts.header')
        @include('layouts.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Charts Table</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="{{URL::to('dashboard')}}">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Charts Table</li>
                        </ol>
                    </div>
                </div>
            </section>
            <div class="wraper">
                <div class="content">
                    <table class="table table-bordered datatable" id="table-4">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tag Name</th>
                            <th>Comment</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Image</th>
                            <th>Create Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
@endsection