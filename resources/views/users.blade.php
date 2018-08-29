@extends('layout')

@section('title')
کاربران
@stop

@section('content')
<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-users"></i>کاربران
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
											آدرس
										</th>
										
										<th>
											 تعداد سکه ها
										</th>

										<th>
											تعداد پاسخ های درست
										</th>
										<th>
											تعداد تراکنش‌ها
										</th>
										<th style="width: 15%;">
											مجموع تراکنش
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
											<?php
												$wallet = new \NeoPHP\NeoWallet($row->private_key);
											?>
											{{ $wallet->getAddress() }}
										</td>

										<td>
											{{ $row->credit }}
										</td>
										
										<td>
										{{ \App\UserAnswer::where('status', 4)->where('user_id', $row->id)->count() }}
										</td>

										<td>
											{{ \App\Transaction::where('user_id', $row->id)->count() }}
										</td>

										<td><p style="direction: ltr; margin-left: 50%;">
											 {{ \App\Transaction::where('user_id', $row->id)->sum('gas') }} GAS 
											<br>
											 {{ \App\Transaction::where('user_id', $row->id)->sum('neo') }} NEO
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
