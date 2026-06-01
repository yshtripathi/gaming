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

<style>
/* Gaming Theme Toast Notifications - Fixed Positioning */
.ws-toast-wrapper {
    position: fixed;
    top: 90px;
    right: 20px;
    z-index: 100000;
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-width: 400px;
    pointer-events: none;
}

.ws-toast-wrapper > * {
    pointer-events: auto;
}

.ws-toast {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px 20px;
    background: linear-gradient(135deg, rgba(26, 31, 54, 0.95), rgba(13, 13, 26, 0.98));
    border: 1px solid rgba(139, 92, 246, 0.3);
    border-radius: 16px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), 0 0 30px rgba(139, 92, 246, 0.2);
    backdrop-filter: blur(20px);
    animation: ws-toast-slide-in 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    position: relative;
    overflow: hidden;
}

.ws-toast::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    border-radius: 16px 16px 0 0;
}

.ws-toast-success::before {
    background: linear-gradient(90deg, #22c55e, #16a34a);
}
.ws-toast-error::before {
    background: linear-gradient(90deg, #ef4444, #dc2626);
}
.ws-toast-warning::before {
    background: linear-gradient(90deg, #f59e0b, #d97706);
}
.ws-toast-info::before {
    background: linear-gradient(90deg, var(--ws-primary, #8B5CF6), var(--ws-accent, #A855F7));
}

.ws-toast.fade-out {
    animation: ws-toast-fade-out 0.4s ease forwards;
}

.ws-toast-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ws-toast-success .ws-toast-icon {
    background: linear-gradient(135deg, #22c55e, #16a34a);
}
.ws-toast-error .ws-toast-icon {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}
.ws-toast-warning .ws-toast-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}
.ws-toast-info .ws-toast-icon {
    background: linear-gradient(135deg, var(--ws-primary, #8B5CF6), var(--ws-accent, #A855F7));
}

.ws-toast-icon svg {
    width: 22px;
    height: 22px;
    color: white;
}

.ws-toast-content {
    flex: 1;
}

.ws-toast-message {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.5;
}

.ws-toast-close {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    padding: 4px;
    border-radius: 6px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ws-toast-close:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

.ws-toast-close svg {
    width: 18px;
    height: 18px;
}

/* Animations */
@keyframes ws-toast-slide-in {
    0% {
        transform: translateX(100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes ws-toast-fade-out {
    0% {
        transform: translateX(0);
        opacity: 1;
    }
    100% {
        transform: translateX(100%);
        opacity: 0;
    }
}

/* Progress bar */
.ws-toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    border-radius: 0 0 16px 16px;
    animation: ws-toast-progress 3s linear forwards;
}

.ws-toast-success .ws-toast-progress {
    background: linear-gradient(90deg, #22c55e, #16a34a);
}
.ws-toast-error .ws-toast-progress {
    background: linear-gradient(90deg, #ef4444, #dc2626);
}
.ws-toast-warning .ws-toast-progress {
    background: linear-gradient(90deg, #f59e0b, #d97706);
}
.ws-toast-info .ws-toast-progress {
    background: linear-gradient(90deg, var(--ws-primary, #8B5CF6), var(--ws-accent, #A855F7));
}

@keyframes ws-toast-progress {
    from { width: 100%; }
    to { width: 0%; }
}

/* Mobile */
@media (max-width: 768px) {
    .ws-toast-wrapper {
        top: auto;
        bottom: 20px;
        right: 10px;
        left: 10px;
        max-width: none;
    }
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
