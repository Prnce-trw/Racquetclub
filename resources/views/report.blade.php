



                        <div class="table-responsive">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Member ID
                                        </th>
                                        <th>
                                            Package
                                        </th>
                                        <th>
                                            Start register
                                        </th>
                                        <th>
                                           Start Package
                                        </th>
                                        <th>
                                            expire.
                                        </th>
                                       
                                       
                                        <th>
                                            Status Card.
                                        </th>
                                        <th>
                                            Expire.
                                        </th>
                                        <th>
                                            Group.
                                        </th>
                                        <th>
                                            Card.
                                        </th>
                                       
                                    </tr>
                                </thead>
							
					
                                <tbody>
    @foreach ($member as $product)
                                    
                                    <tr class="odd gradeX">
                                        <td>
                                            <span class="glyphicon glyphicon-time">
                                            </span>
                                        </td>
                                        <td>

<a title="แก้ไข" type="button" href="{{url('showprofile/'.$product->memberID)}}">{{$product->member_num}}</a>
      
                                   
                                        </td>
                                        <td>
                                           {{$product->package}}
                                        </td>
                                        <td>
                                            {{$product->registerdate}}
                                        </td>
                                        <td>
                                            {{$product->startdate}}
                                        </td>
                                        <td>
                                            {{$product->enddate}}
                                        </td>
                                       
                                      
                                        <td>

                                            {{$product->groups}}
                                           <a data-pk="1" data-source="/groups" data-title="Select group" data-type="select" data-value="5" href="#" id="group">
                                                Admin
                                            </a>
                                        </td>
                                        <td>
                                            12:30:2562
                                        </td>
                                        <td>
                                            <a data-pk="1" data-source="/groups" data-title="Select group" data-type="select" data-value="5" href="#" id="group">
                                                Admin
                                            </a>
                                            A
                                        </td>
                                        <td>
                                            <font color="green">
                                                Accep
                                            </font>
                                        </td>
                                        <td>
                                          

                                                        <br/>
                                                    </br>
                                                </br>
                                            </br>
                                        </td>
                                    </tr>
									
								@endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
