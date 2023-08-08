<x-layout>
    <div class="container py-5 mt-5">
        <div class="row justify-content-center p-3 p-md-0">
            <div class="row col-12 col-xl-8 rl-content">
                <div class="col-12 col-md-6 signin-signup">
                    <form method="POST" action="{{route('login')}}" class="form">
                        @csrf
                        <h2 class="title">Accedi</h2>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="email" placeholder="Email">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn-rl">Accedi</button>
                    </form>
                </div>
                <div class="panels-container col-12 col-md-6">
                    <div class="panel">
                        <div class="text-white">
                            <h3>Non sei registrato?</h3>
                            <p>Scopri un mondo di opportunità! Registrati al nostro sito e accedi a contenuti esclusivi.</p>
                            <a href="{{route('register')}}" class="btn-rl">Registrati</a>
                        </div>
                        <img src="./media/register2.svg" alt="image register" class="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>