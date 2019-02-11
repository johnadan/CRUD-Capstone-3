@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

@include('includes.message-block')

<div class="container-fluid">
	<div class="row">
		<div class="col">
			<br>
			<h6>This is your newsfeed. Follow interesting students and alumnis to get updates from them</h6>	
		</div>
	</div>
</div>


{{-- {{dd(Auth::user())}} --}}
<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                {{-- <!-- @foreach($posts as $post) --> --}}
                <div class="card-body">
                    {{-- <!-- <h5>{{ $post->user->username }}</h5> --> --}}
                    <h5>{{ (Auth::user()->firstname) }} {{ (Auth::user()->lastname) }}</h5>
                    {{-- <!-- <h5>Lorem Ipsum</h5> --> --}}
                    <div class="h7 text-muted">
                        {{-- <!-- {{ $post->user->firstname }}
                                    {{ $post->user->lastname }} --> --}}
                    </div>
                    <div class="h7">Developer of web applications, JavaScript, PHP, HTML, CSS, Bootstrap, Laravel
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="h6 text-muted">Followers</div>
                        <div class="h5">5.2342</div>
                    </li>
                    <li class="list-group-item">
                        <div class="h6 text-muted">Following</div>
                        <div class="h5">6758</div>
                    </li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                {{-- <!-- @endforeach --> --}}
            </div>
        </div>
        <div class="col-md-6 gedf-main">

            <!--- \\\\\\\Post-->
            <div class="card gedf-card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Create a post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Post an Image</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                         <form method="POST" action="/createpost" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="message">post</label>
                                <!-- <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea> -->
                                <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?" name="post"></textarea>
                            </div>
                            <div class="btn-group">
                            <button type="submit" class="button tuitt-button is-btn-blue">Tuitt!</button>
                            </div>
                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                         </form>   

                        </div>
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Upload image</label>
                                </div>
                            </div>
                            <div class="btn-group">
                            <button type="submit" class="button tuitt-button is-btn-blue">Tuitt!</button>
                        </div>
                            <div class="py-4"></div>
                        </div>
                    </div>
                    <div class="btn-toolbar justify-content-between">
                        
                        <!-- <div class="btn-group">
                                <a target="_blank" id="tuitt_home_nav_apply_button_mobile" class="button tuitt-button is-btn-red text-white" data-v-0685d64a="">Tuitt!</a>
                        </div> -->

                        <div class="btn-group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-globe"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post /////-->

            <!--- \\\\\\\Post-->
            <div class="card gedf-card">

                @foreach($posts as $post)
                    {{-- <!-- @foreach($post->Post as $userpost) --> --}}
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0">
                                    <!-- comment <output></output> -->
                                    {{-- <!-- {{ $post->user->firstname }} 
                                    {{ $post->user->lastname }} --> --}}

                                </div>
                                <div class="h7 text-muted">
                                    <!-- <p>@</p> -->
                                    {{-- <!-- {{ $post->user->username }} --> --}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                    <div class="h6 dropdown-header">Configuration</div>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Hide</a>
                                    <a class="dropdown-item" href="#">Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>Posted by {{ (Auth::user()->firstname) }} 
                        {{ (Auth::user()->lastname) }}
                        {{-- <!-- dd(Auth::user()->firstname) --> --}}
                        {{-- <!-- {{ $post->user->firstname }} 
                        {{ $post->user->lastname }} --> --}}
                        at 
                        {{ $post->created_at }}
                    </div>
                    {{-- <!-- <a class="card-link" href="#">
                        <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                    </a> --> --}}
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                    
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                    <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                    <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    <!-- {{ method_field('DELETE')}} -->
                    @if(Auth::user()->id == $post->user_id) 
                    
                    <a href="#" id="edit" class="card-link"><i class="fa fa-mail-forward" data-postid="{{ $post->id }}"></i> Edit</a>
                    <a href="/deletePost/{post_id}" class="card-link"><i class="fa fa-mail-forward"></i> Delete</a>
                   @endif 
                </div>
                   {{-- <!-- @endforeach --> --}}
                @endforeach
            </div>
            <!-- Post /////-->

            <!--- \\\\\\\Post-->
            <!-- <div class="card gedf-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0">@LoremIpsum</div>
                                <div class="h7 text-muted">Lorem Ipsum</div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                    <div class="h6 dropdown-header">Configuration</div>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Hide</a>
                                    <a class="dropdown-item" href="#">Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> 10 min ago</div>
                    <a class="card-link" href="#">
                        <h5 class="card-title"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit consectetur
                            deserunt illo esse distinctio.</h5>
                    </a>

                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nihil, aliquam est, voluptates officiis iure soluta
                        alias vel odit, placeat reiciendis ut libero! Quas aliquid natus cumque quae repellendus. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Ipsa, excepturi. Doloremque, reprehenderit!
                        Quos in maiores, soluta doloremque molestiae reiciendis libero expedita assumenda fuga quae.
                        Consectetur id molestias itaque facere? Hic!
                    </p>
                    <div>
                        <span class="badge badge-primary">JavaScript</span>
                        <span class="badge badge-primary">HTML</span>
                        <span class="badge badge-primary">PHP</span>
                        <span class="badge badge-primary">CSS</span>
                        <span class="badge badge-primary">Boostrap</span>
                        <span class="badge badge-primary">Laravel</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                    <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                    <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                </div>
            </div> -->
            <!-- Post /////-->

            <!--- \\\\\\\Post-->
            <!-- <div class="card gedf-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0">@LoremIpsum</div>
                                <div class="h7 text-muted">Lorem Ipsum</div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                    <div class="h6 dropdown-header">Configuration</div>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Hide</a>
                                    <a class="dropdown-item" href="#">Report</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> Hace 40 min</div>
                    <a class="card-link" href="#">
                        <h5 class="card-title">Totam non adipisci hic! Possimus ducimus amet, dolores illo ipsum quos
                            cum.</h5>
                    </a>

                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit reprehenderit consectetur exercitationem odio,
                        quam nobis? Officiis, similique, harum voluptate, facilis voluptas pariatur dolorum tempora sapiente
                        eius maxime quaerat.
                        <a href="https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU" target="_blank">https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU</a>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                    <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                    <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                </div>
            </div> -->
            <!-- Post /////-->
        </div>
        
        <div class="col-md-3">
            <div class="card gedf-card">
                <div class="card-body">
                    {{-- @foreach($users as $user)--}}
                    <h5 class="card-title">{{-- $user->firstname --}} {{-- $user->laststname --}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">lorem ipsum</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="card-link">Follow</a>
                    <a href="#" class="card-link">Another link</a>
                    {{-- @endforeach --}}
                </div>
            </div>
            {{-- <!-- <div class="card gedf-card">
                <div class="card-body">
                    <h5 class="card-title">@Loremipsum</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="card-link">Follow</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div> --> --}}
        </div>    
    </div>
</div>

{{-- <!-- <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --> --}}

<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="post-body">Edit Post</label>
                <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection