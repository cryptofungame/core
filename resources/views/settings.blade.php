@extends('layout')

@section('title')
تنظیمات
@stop

@section('content')
{!! Form::open(array('action' => ['AdminController@settings'] ,'class' => 'form-horizontal')) !!}
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>تنظیمات
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							
							<hr/>
							<div class="tab-content">
								<div class="tab-pane fade active in">
									
										<!-- BEGIN FORM-->
										
									
											
												<div class="form-group">
													<label for="show_answer" class="col-md-3 control-label">تعداد کسر سکه برای مشاهده پاسخ</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('show_answer',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
														</div>
													
													</div>
												</div>

												<div class="form-group">
													<label for="show_hint" class="col-md-3 control-label">تعداد کسر سکه برای مشاهده راهنمایی</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('show_hint',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
														</div>
													
													</div>
												</div>

												<div class="form-group">
													<label for="answer" class="col-md-3 control-label">تعداد افزایش سکه برای پاسخ صحیح</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('answer',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
														</div>
													
													</div>
												</div>

												
							    </div>
							   
								
							</div>

						</div>

					</div>
						 <div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														{!! Form::submit('به روز رسانی', array('class' => 'btn btn-circle blue')) !!}
														
													</div>
												</div>
											</div>

@stop