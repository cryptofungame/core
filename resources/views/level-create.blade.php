@extends('layout')

@section('title')
افزودن سطح جدید
@stop

@section('content')
{!! Form::open(array('action' => ['LevelController@store'] ,'class' => 'form-horizontal','id' => 'myform', 'files' => true)) !!}
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-question"></i>افزودن سطح
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
													<label for="title" class="col-md-3 control-label">عنوان</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('title',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
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
														{!! Form::submit('ثبت', array('class' => 'btn btn-circle blue')) !!}
														
													</div>
												</div>
											</div>

@stop