<table class="table table-bordered" style="text-align:center;">
    <thead>
        <tr>
            <th>
                URL
            </th>
            <th>
                Status
            </th>
            <th>
                Ações
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($url->url); ?>

            </td>
            <td>
                <?php echo e($url->status_code); ?>

            </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-default showUrl" href="/urls/show/<?php echo e($url->id); ?>" target="_blank" id="<?php echo e($url->id); ?>" title="Visualisar Resposta">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a id="<?php echo e($url->id); ?>" class="btn btn-default removeUrl" title="Excluir Url">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /app/resources/views/urls/list.blade.php ENDPATH**/ ?>