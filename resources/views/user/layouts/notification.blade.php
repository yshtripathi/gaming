@if(session('success'))
    <div class="ws-toast ws-toast-success" id="wsToastSuccess">
        <div class="ws-toast-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
        </div>
        <div class="ws-toast-content">
            <span class="ws-toast-message">{{ session('success') }}</span>
        </div>
        <button class="ws-toast-close" onclick="closeWsToast('wsToastSuccess')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="ws-toast ws-toast-error" id="wsToastError">
        <div class="ws-toast-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="15" y1="9" x2="9" y2="15"/>
                <line x1="9" y1="9" x2="15" y2="15"/>
            </svg>
        </div>
        <div class="ws-toast-content">
            <span class="ws-toast-message">{{ session('error') }}</span>
        </div>
        <button class="ws-toast-close" onclick="closeWsToast('wsToastError')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
@endif

@if(session('loginerror'))
    <div class="ws-toast ws-toast-error" id="wsToastLoginError">
        <div class="ws-toast-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="15" y1="9" x2="9" y2="15"/>
                <line x1="9" y1="9" x2="15" y2="15"/>
            </svg>
        </div>
        <div class="ws-toast-content">
            <span class="ws-toast-message">{{ session('loginerror') }}</span>
        </div>
        <button class="ws-toast-close" onclick="closeWsToast('wsToastLoginError')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
@endif

@if(session('warning'))
    <div class="ws-toast ws-toast-warning" id="wsToastWarning">
        <div class="ws-toast-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                <line x1="12" y1="9" x2="12" y2="13"/>
                <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
        </div>
        <div class="ws-toast-content">
            <span class="ws-toast-message">{{ session('warning') }}</span>
        </div>
        <button class="ws-toast-close" onclick="closeWsToast('wsToastWarning')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
@endif

@if(session('info'))
    <div class="ws-toast ws-toast-info" id="wsToastInfo">
        <div class="ws-toast-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="16" x2="12" y2="12"/>
                <line x1="12" y1="8" x2="12.01" y2="8"/>
            </svg>
        </div>
        <div class="ws-toast-content">
            <span class="ws-toast-message">{{ session('info') }}</span>
        </div>
        <button class="ws-toast-close" onclick="closeWsToast('wsToastInfo')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
@endif

@if(isset($errors) && $errors->any())
    @foreach($errors->all() as $error)
    <div class="ws-toast ws-toast-error" id="wsToastErr{{ $loop->index }}">
        <div class="ws-toast-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="15" y1="9" x2="9" y2="15"/>
                <line x1="9" y1="9" x2="15" y2="15"/>
            </svg>
        </div>
        <div class="ws-toast-content">
            <span class="ws-toast-message">{{ $error }}</span>
        </div>
        <button class="ws-toast-close" onclick="closeWsToast('wsToastErr{{ $loop->index }}')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    @endforeach
@endif

<style>
/* PolyGamez toast notifications — top-centered, drops in below the header.
   Built on the app.css palette (no --ws-/purple). */
.ws-toast-wrapper {
    position: fixed;
    top: 100px;                 /* just below the ~84px header */
    left: 50%;
    transform: translateX(-50%);
    z-index: 100000;
    display: flex;
    flex-direction: column;
    align-items: center;        /* keep every toast centered */
    gap: 12px;
    width: auto;
    max-width: 92vw;
    pointer-events: none;
}
.ws-toast-wrapper > * { pointer-events: auto; }

.ws-toast {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    min-width: 280px;
    max-width: 92vw;
    padding: 12px 14px;
    background: #ffffff;
    color: var(--text, #0b0d10);
    border: 1px solid var(--border-light, rgba(8, 10, 12, 0.08));
    border-radius: 16px;
    box-shadow: 0 18px 45px rgba(8, 10, 12, 0.18);
    position: relative;
    animation: ws-toast-drop 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}
.ws-toast.fade-out { animation: ws-toast-rise 0.35s ease forwards; }

/* circular, color-coded icon */
.ws-toast-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.ws-toast-success .ws-toast-icon { background: #16a34a; }
.ws-toast-error   .ws-toast-icon { background: var(--accent, #ff2a2a); }
.ws-toast-warning .ws-toast-icon { background: #d97706; }
.ws-toast-info    .ws-toast-icon { background: var(--primary, #dfff00); }
.ws-toast-icon svg { width: 20px; height: 20px; color: #ffffff; }
.ws-toast-info .ws-toast-icon svg { color: var(--text, #0b0d10); }

.ws-toast-content { flex: 1; }
.ws-toast-message {
    font-size: 14px;
    font-weight: 600;
    color: var(--text, #0b0d10);
    line-height: 1.4;
}

.ws-toast-close {
    background: transparent;
    border: none;
    color: var(--text-muted, #68707a);
    cursor: pointer;
    padding: 4px;
    border-radius: 50%;
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}
.ws-toast-close:hover { background: rgba(8, 10, 12, 0.06); color: var(--text, #0b0d10); }
.ws-toast-close svg { width: 16px; height: 16px; }

/* drop down on enter, rise up on exit */
@keyframes ws-toast-drop {
    0%   { transform: translateY(-24px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}
@keyframes ws-toast-rise {
    0%   { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(-24px); opacity: 0; }
}

/* progress bar not used in this layout */
.ws-toast-progress { display: none !important; }

@media (max-width: 576px) {
    .ws-toast-wrapper { top: 80px; max-width: 94vw; }
    .ws-toast { min-width: 0; width: 94vw; }
}
</style>

<script>
function closeWsToast(id) {
    var toast = document.getElementById(id);
    if (toast) {
        toast.classList.add('fade-out');
        setTimeout(function() {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 400);
    }
}

// Auto close after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
    var toasts = document.querySelectorAll('.ws-toast');
    toasts.forEach(function(toast) {
        // Add progress bar
        var progress = document.createElement('div');
        progress.className = 'ws-toast-progress';
        toast.appendChild(progress);
        
        // Auto remove after 3 seconds
        setTimeout(function() {
            closeWsToast(toast.id);
        }, 3000);
    });
});
</script>
