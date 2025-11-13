@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1>Contactez-nous</h1>
            <p class="lead">Une question, une suggestion ? Nous sommes à votre écoute.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="p-4" style="background-color: var(--white); border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Votre nom</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Votre email</label>
                            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="form-label">Sujet</label>
                            <select name="subject" id="subject" class="form-select" required>
                                <option value="info" {{ old('subject', request('subject')) == 'info' ? 'selected' : '' }}>Demande d'information</option>
                                <option value="reservation" {{ old('subject', request('subject')) == 'reservation' ? 'selected' : '' }}>Réservation d'un produit</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label">Votre message</label>
                            <textarea name="message" id="message" class="form-control" rows="5" required>{{ old('message', request('message')) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-accent w-100">Envoyer</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.991625996349!2d2.352221915674268!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C%20France!5e0!3m2!1sfr!2sfr!4v1672823257918!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0; border-radius: 12px; min-height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
