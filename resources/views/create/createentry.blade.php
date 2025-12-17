<!-- Tawag sa Navbar ug sa Sidebar -->
@extends('layouts.layout')

@section('content')

<style>
    /* --- 1. FIXED HEADER (Prevents Overlap) --- */
    /* This targets standard Bootstrap navbars/headers */
    nav, .navbar, header, .app-header {
        position: sticky !important;
        top: 0;
        z-index: 9999 !important; /* Force it to stay on top */
        background-color: #ffffff !important; /* Solid white background */
        box-shadow: 0 2px 10px rgba(0,0,0,0.05); /* Optional shadow */
    }

    /* --- 2. CONTAINER SPACING (Matches your Layout) --- */
    .content-wrapper {
        padding-left: 5px !important;
        padding-right: 5px !important;
        width: 100%;
    }

    /* --- 3. FORM CARD (Exact match to Table Card size) --- */
    .form-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px; 
        box-shadow: 0 2px 15px rgba(0,0,0,0.02);
        
        /* FORCE FULL WIDTH */
        width: 100% !important; 
        max-width: none !important; 
        margin: 0 !important;
    }

    /* --- FORM STYLING --- */
    .form-group { margin-bottom: 25px; }

    /* Vertical Accent Bar */
    .label-accent {
        border-left: 4px solid #6366F1;
        padding-left: 12px;
        font-weight: 600;
        color: #4B5563;
        font-size: 0.95rem;
        display: block;
        margin-bottom: 8px;
    }

    /* Clean Line Inputs */
    .clean-input, .clean-select {
        width: 100%;
        border: none;
        border-bottom: 1px solid #E5E7EB;
        padding: 10px 0;
        font-size: 1rem;
        color: #1F2937;
        background: transparent;
        border-radius: 0;
    }
    .clean-input:focus, .clean-select:focus {
        outline: none;
        border-bottom: 2px solid #6366F1;
    }

    /* Save Button */
    .btn-save {
        background: linear-gradient(135deg, #6366F1 0%, #EC4899 100%);
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 6px;
        font-weight: 600;
        transition: transform 0.2s;
    }
    .btn-save:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }

    .back-link {
        text-decoration: none;
        color: #1F2937;
        font-weight: 700;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }
    .back-link:hover { color: #6366F1; }
    
    .section-title {
        font-weight: 700;
        color: #9CA3AF;
        font-size: 0.85rem;
        text-transform: uppercase;
        margin-top: 30px;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }
</style>

<div class="container-fluid">
    
    <a href="{{ route('mood.history') }}" class="back-link">
        <i class="fas fa-chevron-left" style="font-size: 1.2rem;"></i> 
        New Mood Entry
    </a>

    <div class="form-card">
        <form action="{{ route('mood.store') }}" method="POST">
            @csrf

            <div class="row">
                
                <div class="col-md-6 pe-md-5">
                    
                    <div class="form-group">
                        <label class="label-accent" style="border-color: #F59E0B;">Entry #</label> <input type="text" class="clean-input" value="ENTRY-{{ date('Ymd') }}-NEW" readonly style="color: #6B7280;">
                    </div>

                    <div class="form-group mt-4">
                        <label class="label-accent">Primary Emotions</label>
                        <select name="emotion" class="clean-select" required>
                            <option selected disabled value="">Select primary feeling...</option>
                            <option value="Happy">Happy</option>
                            <option value="Sad">Sad</option>
                            <option value="Anxious">Anxious</option>
                            <option value="Calm">Calm</option>
                            <option value="Angry">Angry</option>
                            <option value="Neutral">Neutral</option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label class="label-accent">TAGS</label>
                        <input type="text" name="tags" class="clean-input" placeholder="#work #family #weather">
                    </div>

                </div>

                <div class="col-md-6 ps-md-5" style="border-left: 1px solid #f3f4f6;"> <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="label-accent">Created at</label>
                                <input type="date" name="date" class="clean-input" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="label-accent">Time</label>
                                <input type="time" name="time" class="clean-input" value="{{ date('H:i') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label class="label-accent">Specific Emo</label>
                        <input type="text" name="specific_emotion" class="clean-input" placeholder="e.g. Overwhelmed, Excited, Bored">
                    </div>

                </div>
            </div>

            <div class="mt-4">
                <div class="section-title">Details</div>
                
                <div class="form-group">
                    <label class="label-accent">NOTES</label>
                    <textarea name="notes" class="clean-input" rows="3" placeholder="Describe what happened..."></textarea>
                </div>
            </div>

            <div class="mt-5 pt-3 border-top d-flex justify-content-end align-items-center">
                <span class="text-muted small me-3">Check details before saving</span>
                <button type="submit" class="btn-save">
                    <i class="fas fa-check me-2"></i> Save Entry
                </button>
            </div>

        </form>
    </div>
</div>

@endsection