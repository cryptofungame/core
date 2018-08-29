@extends('layout')

@section('title')
ویرایش سوال
@stop

@section('content')
{!! Form::model($model, ['method' => 'PATCH', 'action' => ['AdminController@update', $model->id], 'id' => 'myform','class' => 'form-horizontal','files' => true]) !!}
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-question"></i>ویرایش سوال
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
													<label for="title" class="col-md-3 control-label">عنوان سوال</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('title',null, array('class' => 'form-control input-circle','required' => 'required')) !!}
														</div>
													
													</div>
												</div>

												<div class="form-group">
													<label for="level_id" class="col-md-3 control-label">درجه سختی</label>
													<div class="col-md-4">
														<div class="input-group">
															<select class="form-control input-circle" name="level_id">
																@foreach($levels as $level)
																	<option @if($model->level_id == $level->id) selected="selected" @endif value="{{ $level->id }}">
																		{{ $level->title }}
																	</option>
																@endforeach
															</select>
														</div>
													
													</div>
												</div>

												<div class="form-group">
													<label for="answer" class="col-md-3 control-label">پاسخ</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::text('answer',null, array('class' => 'form-control input-circle')) !!}
														</div>		
													
													</div>
												</div>

												<div class="form-group">
													<label for="hint" class="col-md-3 control-label">راهنمایی</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::textarea('hint',null, array('class' => 'form-control input-circle', 'rows' => 5, 'placeholder' => 'شماره جایگاه کاراکترهایی که میخواهید در راهنمایی نشان داده شوند را به ترتیب و بدون فاصله وارد کنید. مثلا 136 یعنی کاراکترهای اول، سوم و ششم از پاسخ')) !!}
														</div>		
													
													</div>
												</div>

												<div class="form-group">
													<label for="priority" class="col-md-3 control-label">اولویت</label>
													<div class="col-md-4">
														<div class="input-group">
															{!! Form::number('priority',Null, array('class' => 'form-control input-circle','required' => 'required')) !!}
														</div>
													
													</div>
												</div>

												<div class="form-group">
													<label for="image_source" class="col-md-3 control-label">تغییر تصویر سوال</label>
													<div class="col-md-4">

															{!! Form::file('image_source') !!}
													
													</div>
												</div>

												<div class="form-group">
													<label for="answer_image" class="col-md-3 control-label">تغییر تصویر پاسخ</label>
													<div class="col-md-4">

															{!! Form::file('answer_image',array('required' => 'required')) !!}
													
													</div>
												</div>

												<div class="form-group">
													<label for="answer_description" class="col-md-3 control-label">توضیح پاسخ</label>
													<div class="col-md-4">

															<div class="input-group">
															{!! Form::textarea('answer_description',null, array('class' => 'form-control input-circle', 'placeholder' => '')) !!}
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