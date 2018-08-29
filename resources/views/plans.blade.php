@extends('layout')

@section('title')
بسته ها
@stop

@section('content')
<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>بسته ها
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
							{!! Html::link('admin/plans/create','افزودن بسته جدید', array("class" => "btn blue")) !!}
								<div class="table-scrollable">
									<table class="table table-hover">
									<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											عنوان
										</th>

										<th>
											مقدار
										</th>

										<th>
											نوع
										</th>

										<th>
											تعداد سکه
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
											{{ $row->amount }}
										</td>

										<td>
											{{ $row->type }}
										</td>

										<td>
											{{ $row->coins }}
										</td>

										
										
										<td>
											<a class="btn blue" href="{{ url('admin/plans') }}/{{ $row->id }}/edit" ><i class="fa fa-pencil"></i></a>

											<a class="btn red" href="{{ url('admin/plans/delete') }}/{{ $row->id }}" ><i class="fa fa-trash"></i></a>
										
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
