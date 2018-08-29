@extends('layout')

@section('title')
ویرایش بسته
@stop

@section('content')
{!! Form::model($model, ['method' => 'PATCH', 'action' => ['PlanController@update', $model->id], 'id' => 'myform','class' => 'form-horizontal','files' => true]) !!}
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-question"></i>ویرایش بسته
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

												<div class="form-group">
													<label for="amount" class="col-md-3 control-label">مقدار تراکنش</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('amount',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
														</div>
													
													</div>
												</div>

												<div class="form-group">
													<label for="title" class="col-md-3 control-label">نوع</label>
													<div class="col-md-4">
														<select class="form-control input-circle" name="type">
															<option value="neo" @if($model->type == "neo") selected="selected" @endif>Neo</option>
															<option value="gas" @if($model->type == "gas") selected="selected" @endif>Gas</option>
														</select>
													
													</div>
												</div>

												<div class="form-group">
													<label for="coins" class="col-md-3 control-label">تعداد سکه</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('coins',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
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