<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">Project hosting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsNav">
            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/domain">make domain</a>
                </li>
                @endauth
                              
                
                
            </ul>
            {{--  Autch navigation  --}}
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><i class="fas fa-signature"></i>Register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown">
                            {{auth()->user()->name }}<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="/user/profile"><i class="fas fa-user-cog"></i>Update Profile</a>
                            <a class="dropdown-item" href="/user/password"><i class="fas fa-key"></i>New Password</a>


                            @if(auth()->user()->admin)
                            <a class="dropdown-item" href="/howto"><i class="fas fa-globe"></i>how to</a>
                            <a class="dropdown-item" href="/sftpinfo"><i class="fas fa-globe"></i>sftp info</a>
                            <a class="dropdown-item" href="/domaininfo"><i class="fas fa-globe"></i>domain info</a>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/admin/users"><i class="fas fa-users-cog"></i>Users</a>

                                <a class="dropdown-item" href="/admin/domains"><i class="fas fa-toolbox"></i>domains</a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
