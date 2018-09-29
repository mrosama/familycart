     <section id="main-search" class="dir-rtl">
      <div class="container">
          <div class="row">
              <div class="col-md-2 col-sm-3 pull-right">
                 <a id="sidebar-toggle" class="badge visible-xs pull-left"><i class="fa fa-plus fa-lg"></i></a>
                  <div>
                        <div class="user-prof-links">
                            <h4 class="user-prof-name">{{Auth::user()->name}}  </h4>
                            <ul class="user-prof-list">
                                <li><a href="{{URL::to('/').'/'.$lang.'/profile/edit'}}" class="link-active"><i class="fa fa-user"></i>{{trans('lang.personal_details')}}</a></li>
                                <li><a href="{{URL::to('/').'/'.$lang.'/profile/myOrder'}}"><i class="fa fa-archive"></i> {{trans('lang.order_history')}}</a></li>
                                <li><a href="{{URL::to('/').'/'.$lang.'/profile/addresses'}}"><i class="fa fa-book"></i> {{trans('lang.address_book')}}</a></li>
                                <li><a href="{{URL::to('/').'/'.$lang.'/profile/newsletter'}}"><i class="fa fa-newspaper-o"></i> {{trans('lang.subscriptions')}}</a></li>
                                <li><a href="{{URL::to('/').'/'.$lang.'/logout'}}"><i class="fa fa-sign-out"></i> {{trans('lang.logout')}}</a></li>
                            </ul>
                        </div>
                    </div>
              </div>