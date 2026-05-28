@if(session('success')) 
    <div class="alert alert-success" style="padding: 10px; background: #d1fae5; color: #059669; border-radius: 6px; margin-bottom: 20px;"> 
        {{ session('success') }} 
    </div> 
@endif 

@if(session('error')) 
    <div class="alert alert-danger" style="padding: 10px; background: #fee2e2; color: #dc2626; border-radius: 6px; margin-bottom: 20px;">
        {{ session('error') }} 
    </div> 
@endif