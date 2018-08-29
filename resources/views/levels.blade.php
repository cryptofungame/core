@extends('layout')

@section('title')
درجه بندی سختی سوالات
@stop

@section('content')
<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>درجه بندی سختی سوالات
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
							{!! Html::link('admin/levels/create','افزودن سطح جدید', array("class" => "btn blue")) !!}
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
											<a class="btn blue" href="{{ url('admin/levels') }}/{{ $row->id }}/edit" ><i class="fa fa-pencil"></i></a>

											<a class="btn red" href="{{ url('admin/levels/delete') }}/{{ $row->id }}" ><i class="fa fa-trash"></i></a>
										
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
