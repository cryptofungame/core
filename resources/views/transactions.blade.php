@extends('layout')

@section('title')
تراکنش ها
@stop

@section('content')
<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>تراکنش ها
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
								<div class="table-scrollable">
									<table class="table table-hover">
									<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											Hash
										</th>
										
										<th>
											 wif کاربر
										</th>

										<th>
											تاریخ تراکنش
										</th>
										<th style="width: 15%;">
											مقدار تراکنش
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
											{{ $row->transaction_hash }}
										</td>

										<td>
											{{ \App\User::find($row->user_id)->private_key }}
										</td>
										
										<td>
										{{ $row->created_at }}
										</td>

										<td>
											@if($row->gas > 0)
											 	<p style="direction: ltr; margin-left: 50%;">
											 		{{ $row->gas }} GAS
											 	</p>	
											@endif  
											
											@if($row->neo > 0)
											 <p style="direction: ltr; margin-left: 50%;">
											 	{{ $row->neo }} NEO
											 </p>
											@endif
										</p>
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
