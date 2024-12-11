<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="text-center">
                <h2>About Me</h2>
                <p class="text-muted">Hello! my name is Farhan Syahputera,I'm a web developer with a passion for creating stunning and functional websites.</p>
            </div>
        </div>
    </section>

    <!-- Skills Section -->

    <section id="skills" class="py-5 bg-light">
        <div class="container">
            <div class="text-center">
                <h2>Skills</h2>
                <p class="text-muted">Here are the skills I have mastered:</p>
            </div>
            <div class="row">
            @foreach($skill as $item)
                <div class="col-md-4 text-center">
                    <i class="fas fa-code fa-3x text-primary"></i>
                    <h4 class="mt-3">{{ $item->title }}</h4>
                    <p class="text-muted">{{ $item->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Projects Section -->
    <section id="projects" class="py-5">
        <div class="container">
            <div class="text-center">
                <h2>Projects</h2>
                <p class="text-muted">Some of the projects I have worked on:</p>
            </div>
            @foreach($projects as $item)
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->issued_at }}</p>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text">{{ $item->link }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

<!-- Certificates Section -->
<section id="certificates" class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h2>Certificates</h2>
            <p class="text-muted">Certifications I've earned:</p>
        </div>
        <div class="row">
            @foreach($certificates as $certificate)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>{{ $certificate->name }}</h5>
                        <p class="text-muted">{{ $certificate->issued_by }} - {{ $certificate->issued_at }}</p>
                    </div>
                    <div class="card-body">
                        <!-- Menampilkan file PDF -->
                        <iframe 
                            src="{{ Storage::url($certificate->file) }}" 
                            width="100%" 
                            height="300px" 
                            style="border: none;">
                        </iframe>
                        <!-- Tombol untuk membuka file PDF -->
                        <div class="text-center mt-3">
                            <a 
                                href="{{ Storage::url($certificate->file) }}" 
                                target="_blank" 
                                class="btn btn-primary">
                                View Full Certificate
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="text-center">
            <h2>Contact Me</h2>
            <p class="text-muted">Feel free to reach out to me through the details below:</p>
        </div>
        <div class="row justify-content-center">
        
            <div class="col-md-6">
                <ul class="list-group">
                @foreach($contacts as $item)
                    <li class="list-group-item">
                        <i class="fas fa-user fa-fw text-primary me-2"></i>
                        <strong>Your name</strong> {{ $item->name }}
                    </li>
                @endforeach
                @foreach($contacts as $item)
                    <li class="list-group-item">
                        <i class="fas fa-envelope fa-fw text-primary me-2"></i>
                        <strong>Email:</strong> <a href="mailto:youremail@example.com"> {{ $item->gmail }}</a>
                    </li>
                    @endforeach
                    @foreach($contacts as $item)
                    <li class="list-group-item">
                        <i class="fas fa-phone fa-fw text-primary me-2"></i>
                        <strong>WhatsApp:</strong> <a href="https://wa.me/1234567890" target="_blank"> {{ $item->whatsapp }}</a>
                    </li>
                    @endforeach
                    @foreach($contacts as $item)
                    <li class="list-group-item">
                        <i class="fas fa-link fa-fw text-primary me-2"></i>
                        <strong>Website:</strong> <a href="https://yourwebsite.com" target="_blank">{{ $item->link }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-3">
        <div class="container">
            <p>&copy; 2023 Your Name. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
