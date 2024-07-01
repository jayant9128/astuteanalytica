@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> Edit All Report</h1>
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
                @foreach($allReportDatas as $data)
                <form action="{{route('allJapaneseReportEditSave')}}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="all_reports_id" value="{{$data->all_reports_id}}">
                    <input type="hidden" name="report_jap_id" value="{{$data->id}}">
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category <span class="text-danger">*</span></label>
                                <select class="form-control"  readonly required>
                                    <option value=""> -- Select field -- </option>
                                    @foreach($categoryData as $category)
                                    <option value="{{$category->category_id}}" {{$data->category_id == $category->category_id ? 'selected' : ''}} class="font-weight-bold">{{$category->title}}</option>
                                    <?php $childs = $category->childs; ?>
                                        @if(count($category->childs))
                                        @foreach($childs as $child)
                                        <option value="{{$child->category_id}}" {{$data->category_id == $child->category_id ? 'selected' : ''}}>    - {{$child->title}}</option>
                                        @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      <!--   <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Id <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_id" autofocus required placeholder="Report Id" value="{{$data->report_id}}">
                            </div>
                        </div>
 -->


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Title H1<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_title" required placeholder="Report Title H1" value="{{$data->report_title}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Title H2 <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_title_h2" required placeholder="Report Title H2"  value="{{$data->report_title_h2}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="report_slug" required placeholder="Report Slug" readonly value="{{$data->report_slug}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Base Year</label>
                                <input class="form-control" type="number" name="base_year"  placeholder="Base Year" value="{{$data->base_year}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Historic Year </label>
                                <input class="form-control" type="text" name="historic_year"  placeholder="Historic Year" value="{{$data->historic_year}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Forecast Year </label>
                                <input class="form-control" type="text" name="forecast_year"  placeholder="Forecast Year"value="{{$data->forecast_year}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Pages </label>
                                <input class="form-control" type="text" name="pages"  placeholder="Pages"value="{{$data->pages}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Table Figure </label>
                                <input class="form-control" type="number" name="table_figure"  placeholder="Table Figure"value="{{$data->table_figure}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Total Table </label>
                                <input class="form-control" type="number" name="total_table"  placeholder="Total Table"value="{{$data->total_table}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Publish Date <span class="text-danger">*</span> </label>
                                <input class="form-control" type="date" name="publish_date" value="{{$data->publish_date}}" required>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Image <span class="text-danger">(Image Dimensions - 400*500 Pixel) </span></label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div> -->
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image Alt Tag </label>
                                <input class="form-control" type="text" name="alt_tag"  placeholder="Image Alt Tag"value="{{$data->alt_tag}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Delivery Of Report <span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" name="delivery" value="{{$data->delivery}}"  placeholder="Delivery Of Report" >
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="control-label"> Format <span class="text-danger">*</span></div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="pdf" value="YES" id="defaultCheck1" {{$data->pdf == "YES" ? 'checked' : ''}}>
                                            <label class="form-check-label font-weight-bold" for="defaultCheck1" >
                                                PDF
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="excel" value="YES" id="defaultCheck2" {{$data->excel == "YES" ? 'checked' : ''}}>
                                            <label class="form-check-label font-weight-bold" for="defaultCheck2">
                                                EXCEL
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ppt" value="YES" id="defaultCheck3" {{$data->ppt == "YES" ? 'checked' : ''}}>
                                            <label class="form-check-label font-weight-bold" for="defaultCheck3">
                                                PPT
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="web_formate" value="YES" id="defaultCheck4" {{$data->web_formate == "YES" ? 'checked' : ''}}>
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
                                <input class="form-control" type="number" name="single_user"  placeholder="Single User" value="{{$data->single_user}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Single User Selling Price<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="single_user_selling" required placeholder="Single User Selling Price" value="{{$data->single_user_selling}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Multi User </label>
                                <input class="form-control" type="number" name="multi_user"  placeholder="Multi User" value="{{$data->multi_user}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Multi User Selling Price<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="multi_user_selling" required placeholder="Multi User Selling Price" value="{{$data->multi_user_selling}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Corporate User </label>
                                <input class="form-control" type="number" name="corporate_user"  placeholder="Corporate User" value="{{$data->corporate_user}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Corporate User Selling Price <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="corporate_user_selling" required placeholder="Corporate User Selling Price" value="{{$data->corporate_user_selling}}">
                            </div>
                        </div>

                        
                       <!--   <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Preview Image <span class="text-danger">(Image Dimensions - 800*---- Pixel)</span></label>
                                <input class="form-control" type="file" name="report_image" required>
                            </div>
                        </div> -->



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Trending <span class="text-danger">*</span></label>
                                <select class="form-control" name="treading" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES" {{$data->treading == "YES" ? 'selected' : ''}}>YES</option>
                                    <option value="NO" {{$data->treading == "NO" ? 'selected' : ''}}>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Upcoming <span class="text-danger">*</span></label>
                                <select class="form-control" name="upcoming" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES" {{$data->upcoming == "YES" ? 'selected' : ''}}>YES</option>
                                    <option value="NO" {{$data->upcoming == "NO" ? 'selected' : ''}}>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Top Selling <span class="text-danger">*</span></label>
                                <select class="form-control" name="top_selling" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES" {{$data->top_selling == "YES" ? 'selected' : ''}}>YES</option>
                                    <option value="NO" {{$data->top_selling == "NO" ? 'selected' : ''}}>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> On Sale <span class="text-danger">*</span></label>
                                <select class="form-control" name="is_sale" required>
                                    <option value=""> -- Select field -- </option>
                                    <option value="YES" {{$data->is_sale == "YES" ? 'selected' : ''}}>YES</option>
                                    <option value="NO" {{$data->is_sale == "NO" ? 'selected' : ''}}>NO</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title"  value="{{$data->meta_title}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="key_words" placeholder="Meta Keyword"  value="{{$data->key_words}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="meta_desc" placeholder="Meta Description" value="" required>{{$data->meta_desc}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Short Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="short_desc" placeholder="Short Description" required>{{$data->short_desc}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Description 1 <span class="text-danger">*</span></label>
                                <textarea name="report_description_1" id="editor1" required><?php echo $data->report_description_1; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Description 2 <span class="text-danger">*</span></label>
                                <textarea name="report_description_2" id="editor7" required><?php echo $data->report_description_2; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Description 3 <span class="text-danger">*</span></label>
                                <textarea name="report_description_3" id="editor8" required><?php echo $data->report_description_3; ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Report Scoope<span class="text-danger">*</span></label>
                                <textarea name="report_scope" id="editor6" ><?php echo $data->report_scope; ?></textarea>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Market Segmentaion <span class="text-danger"></span></label>
                                <textarea name="market_sagment" id="editor2"><?php echo $data->market_sagment; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Methodology <span class="text-danger"></span></label>
                                <textarea name="methodology" id="editor3"><?php echo $data->methodology; ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> List Of Table<span class="text-danger"></span></label>
                                <textarea name="list_of_tables" id="editor4"><?php echo $data->list_of_tables; ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> List Of Figure<span class="text-danger"></span></label>
                                <textarea name="list_of_figure" id="editor5"><?php echo $data->list_of_figure; ?></textarea>
                            </div>
                        </div>

                       <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Infographics <span class="text-danger">(Image Only)</span></label>
                                <input class="form-control" type="file" name="infographics">
                            </div>
                        </div> -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Infographic Title <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="info_title" value="{{$data->info_title}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Infographic Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="info_desc"  placeholder="Short Description" >{{$data->info_desc}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Audio Text <span class="text-danger">*</span></label>
                                <input class="form-control" name="audio_text" type="text" value="{{$data->audio_text}}" placeholder="Audio Text" required />
                            </div>
                        </div>  

                        <div class="col-sm-8">
                            <button class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->



@stop
