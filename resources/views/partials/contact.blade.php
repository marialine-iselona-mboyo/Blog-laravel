@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-8">
                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>
            </div>
        
            <div class="col-md-6">
                <!-- Success message -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="" method="post" action="{{ route('partials/contact.store') }}">
                    @csrf
                    <div >
                        <label for="name" class="mr-4">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="email" class="mr-4">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="subject" class="mr-3">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div>
                        <label for="message" class="mr-3">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
            
        </div>

        <br><br><br>
        
        <footer>
            <p><span style="font-weight: bold;">MIM</span> HOSPITAL</p>
                <p>Aa Street &#8725; 1070 Anderlecht &#8725;
                <a href="tel:012345678"> tel. 01 234 56 78</a>
            </p>
            <p>
                Opening hours: ma - vr: 10u - 12u30 &#8725; 13u30 - 18u30 &#8725; za: 10u30 - 15u30
            </p>
            <p>
                <a href="mailto:admin@ehb.be">admin@ehb.be</a> &#8725;
                <a href="#">WWW.MIMHOSPITAL.BE</a>
            </p>
        </footer>
    </div>
@endsection