   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}</h4>
      </div> 
      <div class="modal-body">
      <div class="content">
        <div class="row">
            <div id="content" class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8 col-xs-12">
                        <div class="row">
                        </div>
                        <div class="pull-right text-primary text-right">
                            <div class="row">
                            </div>
                        </div>
                        <div class ='row thumb'>
                            @if ($room->images()->get())
                            <div id="sync3" class="owl-carousel">
                                @foreach ($room->images()->get() as $image)
                                <div class="item"><img src="{{URL::asset('public/'.$image->image)}}"/></div>
                                @endforeach
                            </div>
                            <div id="sync4" class="owl-carousel">
                                @foreach ($room->images()->get() as $image)
                                <div class="item"><img src="{{URL::asset('public/'.$image->image)}}"/></div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        {!!$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->description!!}
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-short-description" data-toggle="tab">{{Lang::get('search_hotel.tab_short_description')}}</a></li>
                            @if($attribute_groups)
                            <li><a href="#tab-specification" data-toggle="tab">{{Lang::get('search_hotel.tab_attributes')}}</a></li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab-short-description">{!!$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->short_description!!}</div>
                            @if($attribute_groups)
                            <div class="tab-pane" id="tab-specification">
                                <div class = "header-box-hightlight">
                                    <strong>{{Lang::get('search_hotel.text_features')}} {{$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}</strong>
                                </div>
                                <div class = "content-box-hightlight">
                                    <table class="table">
                                        <tbody>
                                            @foreach($attribute_groups as $attributes_group)
                                            <tr>
                                                <td><strong>{{$attributes_group['group_name']}}</strong></td>
                                                <td class="pull-left col-sm-12">
                                                	@foreach($attributes_group['name'] as $attribute)
                                                	<div class="col-md-4">
                                                		<strong><i class = "glyphicon glyphicon-ok text-success" ></i></strong> {{$attribute}}
                                                	</div>
                                                	@endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary">{{Lang::get('search_hotel.button_search')}}</button>
      </div>
<script type="text/javascript">
            $(document).ready(function () {

    var sync1 = $("#sync3");
            var sync2 = $("#sync4");
            sync1.owlCarousel({
            singleItem: true,
                    slideSpeed: 1000,
                    navigation: true,
                    pagination: false,
                    afterAction: syncPosition,
                    responsiveRefreshRate: 200,
            });
            sync2.owlCarousel({
            items: 7,
                    itemsDesktop: [1199, 10],
                    itemsDesktopSmall: [979, 10],
                    itemsTablet: [768, 8],
                    itemsMobile: [479, 4],
                    pagination: false,
                    responsiveRefreshRate: 100,
                    afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                    }
            });
            function syncPosition(el) {
            var current = this.currentItem;
                    $("#sync4")
                    .find(".owl-item")
                    .removeClass("synced")
                    .eq(current)
                    .addClass("synced")
                    if ($("#sync4").data("owlCarousel") !== undefined) {
            center(current)
            }
            }

    $("#sync4").on("click", ".owl-item", function (e) {
    e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
    });
            function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                    var num = number;
                    var found = false;
                    for (var i in sync2visible) {
            if (num === sync2visible[i]) {
            var found = true;
            }
            }

            if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
            if (num - 1 === - 1) {
            num = 0;
            }
            sync2.trigger("owl.goTo", num);
            }
            } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
            } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
            }

            }

    });</script>
