
@extends('masters.layout.default_layout')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-globe"></i> Site Information List</h1>
            </div>
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
                    <form action="{{route('siteInformationEditSave')}}" method="post">
                      @csrf
                      @foreach($siteData as $site)
                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Email <span class="text-danger"></span></label>
                                    <input class="form-control" type="email" name="email" value="{{$site->email}}" autofocus  placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Contact * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->contact}}"  type="text" name="contact"  placeholder="Contact">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">  Another Contact * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->contact_one}}"  type="text" name="contact_one"  placeholder="Contact One">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Facebook * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->facebook}}"  type="text" name="facebook"  placeholder="Facebook">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Twitter * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->twitter}}"  type="text" name="twitter"  placeholder="Twitter">
                                </div>
                            </div>
                            
                            <!--<div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Instagram * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->instagram}}"  type="text" name="instagram"  placeholder="Instagram">
                                </div>
                            </div>-->
                            
                           <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Google Pulse * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->google_pluse}}"  type="text" name="google_pluse"  placeholder="Google Pluse">
                                </div>
                            </div>-->
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Youtube * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->youtube}}"  type="text" name="youtube"  placeholder="Youtube">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Linkedin * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->linkedin}}"  type="text" name="linkedin"  placeholder="Linkedin">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Whatapp * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->whatapp}}"  type="text" name="whatapp"  placeholder="Whatapp">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Meta Title * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->meta_title}}"  type="text" name="meta_title"  placeholder="Meta Title">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Meta Keyword * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->meta_keyword}}"  type="text" name="meta_keyword"  placeholder="Meta Keyword">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Meta Description * <span class="text-danger"></span></label>
                                    <input class="form-control" value="{{$site->meta_description}}"  type="text" name="meta_description"  placeholder="Meta Description">
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Address </label>
                                    <textarea class="form-control" type="text" name="address" id="address"   placeholder="Address"><?php echo $site->address; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </main>
 
   @stop