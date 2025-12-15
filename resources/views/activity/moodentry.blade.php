@extends('layouts.layout')

@section('content')

<style>
    .content {
        padding-left: 15px !important;  
        padding-right: 15px !important; 
    }
    .table-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px 15px; 
        box-shadow: 0 2px 15px rgba(0,0,0,0.02);
        width: 100%; 
        max-width: none; 
    }
    .header-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }
    .search-box { position: relative; width: 300px; }
    .search-box input { border-radius: 20px; padding-left: 35px; border: 1px solid #e0e0e0; background: #f9f9f9; }
    .search-box i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #aaa; }
    /* New Entry  */
    .btn-new { background-color: #0d6efd; color: white; border-radius: 20px; padding: 8px 20px; font-weight: 500; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: 0.2s; cursor: pointer; }
    .btn-new:hover { background-color: #0b5ed7; color: white; }
    .table thead th {
        font-size: 0.7rem; 
        text-transform: uppercase;
        color: #999;
        font-weight: 700;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
        letter-spacing: 0.5px;
    }
    .table tbody td {
        vertical-align: middle;
        padding: 10px 15px; 
        color: #333;
        font-size: 0.85rem;
        font-weight: 500;
    }
    .table-hover tbody tr:hover { background-color: #f8f9fa; }
    
    /* Badges
    .badge-mood { padding: 4px 10px; border-radius: 6px; font-weight: 600; font-size: 0.7rem; }
    .bg-soft-blue { background-color: #e3f2fd; color: #1565c0; }
    .bg-soft-green { background-color: #e8f5e9; color: #2e7d32; } */
</style>
    <div class="container-fluid"> <h3 class="fw-bold text-dark mb-4">Mood Entries</h3>

        <div class="table-card">
            <div class="header-controls">
                <div class="d-flex align-items-center">
                    <select class="form-select form-select-sm" style="width: 150px; border-radius: 20px;">
                        <option>All Entries</option>
                        <option>This Week</option>
                        <option>This Month</option>
                    </select>
                </div>
                <div class="d-flex gap-3">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control form-control-sm" placeholder="Search...">
                    </div>
                    <button type="button" class="btn-new">
                        <i class="fas fa-plus"></i> New Entry
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Emotion</th>
                            <th>Intensity</th>
                            <th>Notes</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Empty for now --}}
                    </tbody>
                </table>
                
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-clipboard-list fa-2x mb-3 text-secondary" style="opacity: 0.5;"></i>
                    <p>No mood entries found.</p>
                </div>
            </div>
        </div>
    </div>

    @endsection