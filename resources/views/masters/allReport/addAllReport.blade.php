@extends('masters.layout.default_layout')
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> Add All Report</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('allReport')}}"><i class="fa fa-eye"></i> All Report List</a>
        </ul>
    </div>
    <div class="row bg-white py-3">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </p>
                @endif
                @endforeach
            </div>
            <div class="card-box">
                <form action="{{route('allReportSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required>
                                    <option value=""> -- Select field -- </option>
                                    @foreach($categoryData as $category)
                                    <option value="{{$category->category_id}}" class="font-weight-bold">{{$category->title}}</option>
                                    <?php $childs = $category->childs; ?>
                                    @if(count($category->childs))
                                    @foreach($childs as $child)
                                    <option value="{{$child->category_id}}"> - {{$child->title}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Id <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_id" autofocus required placeholder="Report Id">
                            </div>
                        </div>-->



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Title H1<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_title" required placeholder="Report Title H1">
                            </div>
                        </div>
                        

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Title H2 <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_title_h2" required placeholder="Report Title H2">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_slug" required placeholder="Report Slug">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Base Year</label>
                                <input class="form-control" type="number" name="base_year"  placeholder="Base Year">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Historic Year </label>
                                <input class="form-control" type="text" name="historic_year"  placeholder="Historic Year">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Forecast Year </label>
                                <input class="form-control" type="text" name="forecast_year"  placeholder="Forecast Year">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Pages </label>
                                <input class="form-control" type="text" name="pages"  placeholder="Pages">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Table Figure </label>
                                <input class="form-control" type="number" name="table_figure"  placeholder="Table Figure">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Total Table </label>
                                <input class="form-control" type="number" name="total_table"  placeholder="Total Table">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Publish Date <span class="text-danger">*</span> </label>
                                <input class="form-control" type="date" name="publish_date" required>
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Image <span class="text-danger">(Image Dimensions - 400*500 Pixel) *</span></label>
                                <input class="form-control" type="file" name="image" required>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image Alt Tag <span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" name="alt_tag"  placeholder="Image Alt Tag" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Delivery Of Report <span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" name="delivery"  placeholder="Delivery Of Report" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Update Available?</label>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="update_availiable" value="1">
                                            <label class="form-check-label font-weight-bold">
                                                Yes
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="control-label"> Format <span class="text-danger">*</span></div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="pdf" value="YES" id="defaultCheck1" checked>
                                            <label class="form-check-label font-weight-bold" for="defaultCheck1" >
                                                PDF
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="excel" value="YES" id="defaultCheck2">
                                            <label class="form-check-label font-weight-bold" for="defaultCheck2">
                                                EXCEL
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ppt" value="YES" id="defaultCheck3">
                                            <label class="form-check-label font-weight-bold" for="defaultCheck3">
                                                PPT
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="web_formate" value="YES" id="defaultCheck4">
                                            <label class="form-check-label font-weight-bold" for="defaultCheck4">
                                                WEB FORMATE
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Single User Price</label>
                                <input class="form-control" type="number" name="single_user"  placeholder="Single User">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Single User Selling Price<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="single_user_selling" required placeholder="Single User Selling Price">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Multi User </label>
                                <input class="form-control" type="number" name="multi_user"  placeholder="Multi User">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Multi User Selling Price<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="multi_user_selling" required placeholder="Multi User Selling Price">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Corporate User </label>
                                <input class="form-control" type="number" name="corporate_user"  placeholder="Corporate User">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Corporate User Selling Price <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="corporate_user_selling" required placeholder="Corporate User Selling Price">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Preview Image <span class="text-danger">(Image Dimensions - 800*---- Pixel)</span></label>
                                <input class="form-control" type="file" name="report_image" required>
                            </div>
                        </div>-->



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Trending <span class="text-danger">*</span></label>
                                <select class="form-control" name="treading" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Upcoming <span class="text-danger">*</span></label>
                                <select class="form-control" name="upcoming" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Top Selling <span class="text-danger">*</span></label>
                                <select class="form-control" name="top_selling" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> On Sale <span class="text-danger">*</span></label>
                                <select class="form-control" name="is_sale" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title"  >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="key_words" placeholder="Meta Keyword">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="meta_desc" placeholder="Meta Description" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Short Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="short_desc" placeholder="Short Description" required></textarea>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Description_1 <span class="text-danger">*</span></label>
                                <textarea name="report_description_1" id ="editor1" required>&nbsp;</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Bargraph Text</label>
                                <input class="form-control" type="text" name="bargraph_text" >
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="control-label">Bar Gaph</label>
                                <table class="table" id="tbl-bargraph">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">xValues</th>
                                            <th style="width: 25%;">yValues</th>
                                            <th style="width: 10%;">BarColors</th>
                                            <th style="width: 10%;">Fake Values</th>
                                            <th style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-bargraph">
                                        <tr data-row="0">
                                            <td>
                                                <input class="form-control" type="text" name="bargraph[0][xValues]" id="bargraph_0_xValues">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="bargraph[0][yValues]" id="bargraph_0_yValues">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="bargraph[0][barColors]" id="bargraph_0_barColors" value="blue">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="bargraph[0][bar_fake]" id="bargraph_0_bar_fake" >
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm px-3 py-1" type="button" id="add-bargraph">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Description_2 <span class="text-danger">*</span></label>
                                <textarea name="report_description_2" id ="editor7" required>&nbsp;</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Piechart Text</label>
                                <input class="form-control" type="text" name="piechart_text" >
                            </div>
                        </div>
                      
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="control-label">Pie Chart</label>
                                <table class="table" id="tbl-piechart">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">xValues</th>
                                            <th style="width: 25%;">yValues</th>
                                            <th style="width: 10%;">BarColors</th>
                                            <th style="width: 10%;">Fake Values</th>
                                            <th style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-piechart">
                                        <tr data-row="0">
                                            <td>
                                                <input class="form-control" type="text" name="piechart[1][xValues]" id="piechart_1_xValues">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="piechart[1][yValues]" id="piechart_1_yValues">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="piechart[1][pieColors]" id="piechart_1_pieColors">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="piechart[1][pie_fake]" id="piechart_1_piefake">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <input class="form-control" disabled="disabled" type="text" name="disabled" id="disabled">
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm px-3 py-1" type="button" id="add-piechart">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Description_3 <span class="text-danger">*</span></label>
                                <textarea name="report_description_3" id ="editor8" required>&nbsp;</textarea>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Scoope <span class="text-danger"></span></label>
                                <textarea name="report_scope" id ="editor6"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Market Segmentaion <span class="text-danger"></span></label>
                                <textarea name="market_sagment" id ="editor2"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Methodology <span class="text-danger"></span></label>
                                <textarea name="methodology" id ="editor3"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> List Of Table<span class="text-danger"></span></label>
                                <textarea name="list_of_tables" id ="editor4"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> List Of Figure<span class="text-danger"></span></label>
                                <textarea name="list_of_figure" id ="editor5"></textarea>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Infographics <span class="text-danger">(Image Only)</span></label>
                                <input class="form-control" type="file" name="infographics">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Infographic Title <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="info_title">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Infographic Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="info_desc" placeholder="Short Description" ></textarea>
                            </div>
                        </div>
                        
                       <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Audio Text <span class="text-danger">*</span></label>
                                <input class="form-control" name="audio_text" type="text" placeholder="Audio Text" required>
                            </div>
                        </div>


                        <div class="col-sm-8">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->


@stop

