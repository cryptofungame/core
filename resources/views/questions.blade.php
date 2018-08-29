@extends('layout')

@section('title')
سوالات
@stop

@section('content')
<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>سوالات
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse" data-original-title="" title="">
									</a>
									<a href="javascript:;" class="reload" data-original-title="" title="">
									</a>
								</div>
							</div>

							<div class="portlet-body">
							
							<div>
							{!! Html::link('admin/questions/create','افزودن سوال جدید', array("class" => "btn blue")) !!}
								<div class="table-scrollable">
									<table class="table table-hover">
									<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											عنوان سوال
										</th>
										<th>
											 درجه سختی
										</th>
										<th>
											 تصویر
										</th>
										<th>
											اولویت
										</th>
										<th>
											 پاسخ
										</th>
										
										<th>
											 
										</th>
										
									</tr>
									</thead>
									<tbody>
									<?php $i=1; ?>	
									@foreach($query as $row)
									<tr>

										<td>
											{{ $i++ }}
										</td>
										<td>
											{{ $row->title }}
										</td>

										<td>
											 {{ \App\Level::find($row->level_id)->title }}
										</td>

										<td>
											{{ Html::image($row->image_source,'', array("style" => "height:auto;width:auto;max-height:50px; max-width:50px;"))}}
										</td>

										<td>
											{{ $row->priority }}
										</td>

										<td>
											 {{ $row->answer }} 
										</td>

										
										
										<td>
											<a class="btn blue" href="{{ url('admin/questions') }}/{{ $row->id }}/edit" ><i class="fa fa-pencil"></i></a>

											<a class="btn red" href="{{ url('admin/questions/delete') }}/{{ $row->id }}" ><i class="fa fa-trash"></i></a>
										
										</td>
									</tr>
									@endforeach
									</tbody>
									</table>
									
									{!! $query->render() !!}
								</div>

							</div>
						</div>
						</div>
@stop
