@extends("layouts.front")
@section("title", "Dashboard")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-candidate-management")

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <!--Filter Short By-->
                    <div class="twm-right-section-panel site-bg-gray">
                        <div class="wt-admin-dashboard-msg-2  twm-dashboard-style-2">
                            <!--Left Msg section-->
                            <div class="wt-dashboard-msg-user-list">
                                   <div class="user-msg-list-btn-outer">
                                    <button class="user-msg-list-btn-close">Close</button>
                                    <button class="user-msg-list-btn-open">User Message</button>
                                </div>
                                <!-- Search Section Start-->
                                <div class="wt-dashboard-msg-search">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search Messages" type="text">
                                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <!-- Search Section End-->

                                <!-- Search Section End-->
                                <div class="msg-find-list">
                                    <select class="wt-select-box bs-select-hidden">
                                        <option>Recent Chats</option>
                                        <option>Short by Time</option>
                                        <option>Short by Unread</option>
                                    </select>
                                </div>
                                <!-- Search Section End-->

                                <!-- user msg list start-->
                                <div id="msg-list-wrap" class="wt-dashboard-msg-search-list scrollbar-macosx">

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">Thu</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic4.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Randall Henderson</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">2 hours ago</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic1.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Rustin Duza</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">4 hours ago</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic2.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Peter Hawkins</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">Fri</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic3.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Ralph Johnson</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>



                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">16/07/2023</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic1.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Randall Warren</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">16/07/2023</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic2.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Christina Fischer </div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">16/07/2023</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic3.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Wanda Willis</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">16/07/2023</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic4.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Peter Hawkins</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">16/07/2023</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic1.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Kathleen Moreno</div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="wt-dashboard-msg-search-list-wrap">
                                        <a href="javascript:;" class="msg-user-info clearfix">
                                            <div class="msg-user-timing">16/07/2023</div>
                                            <div class="msg-user-info-pic"><img src="{{ asset("assets/images/user-avtar/pic2.jpg") }}" alt=""></div>
                                            <div class="msg-user-info-text">
                                                <div class="msg-user-name">Wanda Montgomery </div>
                                                <div class="msg-user-discription">All created by our Global</div>
                                            </div>
                                        </a>
                                    </div>



                                </div>
                                <!-- user msg list End-->

                            </div>

                            <!--Right Msg section-->
                            <div class="wt-dashboard-msg-box">
                                <div class="single-msg-user-name-box">
                                    <div class="single-msg-short-discription">
                                        <h4 class="single-msg-user-name">Randall Henderson </h4>
                                        IT Contractor
                                    </div>
                                    <a href="#" class="message-action"><i class="far fa-trash-alt"></i> Delete Conversation</a>
                                </div>
                                <div id="msg-chat-wrap" class="single-user-msg-conversation scrollbar-macosx">

                                    <div class="single-user-comment-wrap">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="single-user-comment-block clearfix">
                                                    <div class="single-user-com-pic"><img src="{{ asset("assets/images/user-avtar/pic4.jpg") }}" alt=""></div>
                                                    <div class="single-user-com-text">Breaking the endless cycle of meaningless text message conversations starts with only talking to someone who offers interesting topics opinions.</div>
                                                    <div class="single-user-msg-time">12:13 PM</div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="single-user-comment-wrap sigle-user-reply">
                                        <div class="row justify-content-end">
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="single-user-comment-block clearfix">
                                                    <div class="single-user-com-pic"><img src="{{ asset("assets/images/user-avtar/pic1.jpg") }}" alt=""></div>
                                                    <div class="single-user-com-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</div>
                                                    <div class="single-user-msg-time">12:37 PM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-user-comment-wrap">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="single-user-comment-block clearfix">
                                                    <div class="single-user-com-pic"><img src="{{ asset("assets/images/user-avtar/pic4.jpg") }}" alt=""></div>
                                                    <div class="single-user-com-text">Breaking the endless cycle of meaningless text message conversations starts with only talking to someone who offers interesting topics opinions.</div>
                                                    <div class="single-user-msg-time">12:13 PM</div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="single-user-comment-wrap sigle-user-reply">
                                        <div class="row justify-content-end">
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="single-user-comment-block clearfix">
                                                    <div class="single-user-com-pic"><img src="{{ asset("assets/images/user-avtar/pic1.jpg") }}" alt=""></div>
                                                    <div class="single-user-com-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</div>
                                                    <div class="single-user-msg-time">12:37 PM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-user-comment-wrap">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="single-user-comment-block clearfix">
                                                    <div class="single-user-com-pic"><img src="{{ asset("assets/images/user-avtar/pic4.jpg") }}" alt=""></div>
                                                    <div class="single-user-com-text">Breaking the endless cycle of meaningless text message conversations starts with only talking to someone who offers interesting topics opinions.</div>
                                                    <div class="single-user-msg-time">12:13 PM</div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="single-user-comment-wrap sigle-user-reply">
                                        <div class="row justify-content-end">
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="single-user-comment-block clearfix">
                                                    <div class="single-user-com-pic"><img src="{{ asset("assets/images/user-avtar/pic1.jpg") }}" alt=""></div>
                                                    <div class="single-user-com-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</div>
                                                    <div class="single-user-msg-time">12:37 PM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="single-msg-reply-comment">
                                    <div class="input-group">
                                        <textarea class="form-control" placeholder="Type a message here"></textarea>
                                        <button class="btn" type="button"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push("js")

@endpush
