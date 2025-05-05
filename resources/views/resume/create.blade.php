<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #ffffff);
            color: #343a40;
            padding: 20px 0;
        }

        .form-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            padding: 50px;
            max-width: 850px;
            margin: auto;
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            color: #343a40;
            background: #3c82eb;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .btn-custom {
            background: #3c82eb;
            border: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
            color: #fff;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb);
        }

        textarea.form-control, input.form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .form-section {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 30px;
            }

            .form-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="form-container">
            <h1 class="form-title">Create Your Resume</h1>
            <form action="{{ route('resume.generate') }}" method="POST">
                @csrf

                <div class="form-section">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="Developer">Developer</option>
                        <option value="SEO Expert ">SEO Expert</option>
                        <option value="Designer">Designer </option>
                        <option value="WordPress">WordPress</option>
                    </select>
                </div>

                <div class="form-section">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="row g-3">
                        <div class="col-md-6">
                        <label for="contact" class="form-label">Contact Details</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="col-md-6">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" required>
                        </div>
                    </div>

                <div class="form-section">
                    <label for="summary" class="form-label">Summary</label>
                    <textarea class="form-control" id="summary" name="summary" rows="4" required></textarea>
                </div>

                <div class="form-section">
                    <label for="work_experience" class="form-label">Work Experience</label>
                    <textarea class="form-control" id="work_experience" name="work_experience" rows="5" required></textarea>
                </div>

                <div class="form-section">
                    <label for="education" class="form-label">Education</label>
                    <textarea class="form-control" id="education" name="education" rows="3" required></textarea>
                </div>

                <div class="form-section">
                    <label for="additional_info" class="form-label">Additional Information</label>
                    <textarea class="form-control" id="additional_info" name="additional_info" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-custom w-100">Create Resume</button>
            </form>
        </div>
    </div>
</body>
</html>
