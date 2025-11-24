<?php $__env->startSection('title', __('front.title') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="career-page">
    <div class="container">
        <h1 class="career-title"><?php echo e(__('front.title')); ?></h1>
        <div class="career-title-line"></div>

        <?php if($career): ?>
        <div class="career-intro">
            <div class="career-intro-line"></div>
            <h2 class="career-intro-heading"><?php echo e($career->name); ?></h2>
            <div class="career-intro-line"></div>
        </div>

        <p class="career-intro-text">
            <?php echo e($career->description); ?>

        </p>
        <?php endif; ?>

        <div class="career-positions-head">
            <div class="career-pos-line"></div>
            <div class="career-pos-title"><?php echo e(__('front.available_positions')); ?></div>
            <div class="career-pos-line"></div>
        </div>

        <div class="career-positions">
            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="career-position">
                <div class="career-icon">
                    <?php if($position->photo): ?>
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $position->photo)); ?>" alt="<?php echo e($position->name); ?>" width="40" height="40">
                    <?php else: ?>
                        <!-- Default SVG icon -->
                        <svg width="40" height="40" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="#665D99" opacity=".12"/>
                            <path d="M12 6a3 3 0 0 1 3 3c0 1.3-.4 2.1-.9 2.6l-.5.5V14h-2.2v-2.3l-.5-.5C10.4 11.1 10 10.3 10 9a3 3 0 0 1 3-3Z" fill="#665D99"/>
                            <path d="M8.5 17.5c.4-1.5 1.9-2.5 3.5-2.5s3.1 1 3.5 2.5" stroke="#665D99" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    <?php endif; ?>
                </div>
                <button class="career-pill" data-position="<?php echo e($position->name); ?>" data-position-id="<?php echo e($position->id); ?>" onclick="openJobModal('<?php echo e($position->name); ?>', <?php echo e($position->id); ?>)">
                    <?php echo e($position->name); ?>

                </button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="career-apply-wrap">
            <button class="career-apply-btn" onclick="openJobModal()"><?php echo e(__('front.apply_online')); ?></button>
        </div>

        <?php if($career): ?>
        <div class="career-footer">
            <h2 class="career-footer-title"><?php echo e($career->bottom_name); ?></h2>
            <p class="career-footer-text">
                <?php echo $career->bottom_description; ?>

            </p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Job Application Modal -->
<div class="job-modal-overlay" id="jobModal">
    <div class="job-modal">
        <button class="job-modal-close" onclick="closeJobModal()">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <div class="job-modal-header">
            <h2 class="job-modal-title"><?php echo e(__('front.apply_for_position')); ?></h2>
            <p class="job-modal-subtitle" id="modalPositionName"><?php echo e(__('front.fill_form_below')); ?></p>
        </div>

        <form action="<?php echo e(route('career.apply')); ?>" method="POST" enctype="multipart/form-data" class="job-modal-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="position_id" id="positionIdInput">

            <div class="form-row">
                <div class="form-group">
                    <label for="first_name"><?php echo e(__('front.first_name')); ?> <span class="required">*</span></label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name"><?php echo e(__('front.last_name')); ?> <span class="required">*</span></label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email"><?php echo e(__('front.email')); ?> <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone"><?php echo e(__('front.phone')); ?> <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
            </div>

            <div class="form-group">
                <label for="position"><?php echo e(__('front.position')); ?> <span class="required">*</span></label>
                <select id="position" name="position_name" required>
                    <option value=""><?php echo e(__('front.select_position')); ?></option>
                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($position->name); ?>"><?php echo e($position->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="cv"><?php echo e(__('front.upload_cv')); ?> <span class="required">*</span></label>
                <div class="file-upload-wrapper">
                    <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                    <label for="cv" class="file-upload-label">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span><?php echo e(__('front.choose_file')); ?></span>
                    </label>
                    <span class="file-name" id="fileName"><?php echo e(__('front.no_file_chosen')); ?></span>
                </div>
                <small class="form-hint"><?php echo e(__('front.accepted_formats')); ?>: PDF, DOC, DOCX (<?php echo e(__('front.max_size')); ?>: 5MB)</small>
            </div>

            <div class="form-group">
                <label for="cover_letter"><?php echo e(__('front.cover_letter')); ?></label>
                <textarea id="cover_letter" name="cover_letter" rows="5" placeholder="<?php echo e(__('front.cover_letter_placeholder')); ?>"></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-cancel" onclick="closeJobModal()"><?php echo e(__('front.cancel')); ?></button>
                <button type="submit" class="btn-submit"><?php echo e(__('front.submit_application')); ?></button>
            </div>
        </form>
    </div>
</div>

<style>
/* Modal Styles */
.job-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 9999;
    overflow-y: auto;
    padding: 60px 20px 40px; /* زودنا padding من فوق */
    align-items: flex-start; /* غيرنا من center لـ flex-start */
}

.job-modal-overlay.is-active {
    display: flex;
    justify-content: center;
}

.job-modal {
    background: white;
    border-radius: 12px;
    max-width: 700px;
    width: 100%;
    position: relative;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease-out;
    margin-top: 20px; /* مسافة من فوق */
    margin-bottom: 20px; /* مسافة من تحت */
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.job-modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    cursor: pointer;
    color: #666;
    transition: color 0.3s;
    padding: 5px;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.job-modal-close:hover {
    color: #01AD5E;
    background-color: rgba(1, 173, 94, 0.1);
}

.job-modal-header {
    margin-bottom: 30px;
}

.job-modal-title {
    font-size: 28px;
    font-weight: 700;
    color: #665D99;
    margin-bottom: 10px;
}

.job-modal-subtitle {
    font-size: 16px;
    color: #666;
}

.job-modal-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.required {
    color: #e74c3c;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #01AD5E;
}

.file-upload-wrapper {
    position: relative;
}

.file-upload-wrapper input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.file-upload-label {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    background-color: #665D99;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-weight: 600;
}

.file-upload-label:hover {
    background-color: #01AD5E;
}

.file-name {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    color: #666;
}

.form-hint {
    margin-top: 5px;
    font-size: 12px;
    color: #999;
}

.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 10px;
}

.btn-cancel,
.btn-submit {
    flex: 1;
    padding: 14px 24px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    border: none;
}

.btn-cancel {
    background-color: #f5f5f5;
    color: #666;
}

.btn-cancel:hover {
    background-color: #e0e0e0;
}

.btn-submit {
    background-color: #01AD5E;
    color: white;
}

.btn-submit:hover {
    background-color: #018a4a;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(1, 173, 94, 0.3);
}

/* للموبايل */
@media (max-width: 768px) {
    .job-modal-overlay {
        padding: 40px 15px 30px;
    }

    .job-modal {
        padding: 30px 20px;
        margin-top: 0;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .job-modal-title {
        font-size: 24px;
    }
}

/* للشاشات الصغيرة جداً */
@media (max-width: 480px) {
    .job-modal-overlay {
        padding: 20px 10px;
    }
    
    .job-modal {
        padding: 25px 15px;
    }
}
</style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
<script>
function openJobModal(positionName = null, positionId = null) {
    const modal = document.getElementById('jobModal');
    const positionSelect = document.getElementById('position');
    const positionIdInput = document.getElementById('positionIdInput');
    const modalPositionName = document.getElementById('modalPositionName');
    
    modal.classList.add('is-active');
    document.body.style.overflow = 'hidden';
    
    if (positionName && positionId) {
        positionSelect.value = positionName;
        positionIdInput.value = positionId;
        modalPositionName.textContent = '<?php echo e(__("front.applying_for")); ?>: ' + positionName;
    } else {
        modalPositionName.textContent = '<?php echo e(__("front.fill_form_below")); ?>';
    }
}

function closeJobModal() {
    const modal = document.getElementById('jobModal');
    modal.classList.remove('is-active');
    document.body.style.overflow = '';
}

// Close modal when clicking outside
document.getElementById('jobModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeJobModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeJobModal();
    }
});

// File upload display
document.getElementById('cv')?.addEventListener('change', function(e) {
    const fileName = document.getElementById('fileName');
    if (this.files && this.files[0]) {
        fileName.textContent = this.files[0].name;
    } else {
        fileName.textContent = '<?php echo e(__("front.no_file_chosen")); ?>';
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/career.blade.php ENDPATH**/ ?>