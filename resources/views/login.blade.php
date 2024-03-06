<!--debut header-->
<!DOCTYPE html>

<html lang="fr-CA">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>

   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/bc3a1796c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>
<body class="connexion">
    <div class="container">
        <div class="divCenter col-xl-4 offset-xl-4 ">
            <br>
            <div class="divConnexion">
                <h1 class="text-center imgUser"> <i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></h1>
            
                <form method="post" action="{{ route('login')}}">
                @csrf
                    <div class="form-group" >
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i><br></div>
                        </div>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="adresse_email" value="{{ old('adresse_email')}}">
                    </div> 
                    @error('email')
                        <span class= "text-danger">{{$message}}</span>
                    @enderror
                    
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i> <br></div>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" value="{{ old('password')}}">  
                    </div>
                    @error('password')
                        <span class= "text-danger">{{$message}}</span>
                    @enderror
                    <span class="text-danger">
                        {!! Session::has('invalid') ? Session::get("invalid") : '' !!}
                    </span>
                    <br><br>
                    <div class="row">
                        <div class="divBtConnexion">
                                <button type="submit" class="btn btnLogin text-center mb-5">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>