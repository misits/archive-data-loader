<?php

if (!defined('ABSPATH')) exit;

?>

<div id="adl-file-logs" class="adl-section">
    <h2 class="adl-toggle">
        <span class="adl-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logs">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 12h.01" />
                <path d="M4 6h.01" />
                <path d="M4 18h.01" />
                <path d="M8 18h2" />
                <path d="M8 12h2" />
                <path d="M8 6h2" />
                <path d="M14 6h6" />
                <path d="M14 12h6" />
                <path d="M14 18h6" />
            </svg>
            <?= __('Logs', 'archive-data-loader') ?> <span class="desc"> - <?= __('Manage log files generated by the plugin', 'archive-data-loader') ?>.</span>
        </span>
        <span class="adl-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 9l6 6l6 -6" />
            </svg></span>
    </h2>
    <div class="adl-content">
        <table class="adl_log_list wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?= __('File Name', 'archive-data-loader') ?></th>
                    <th><?= __('Size', 'archive-data-loader') ?></th>
                    <th><?= __('Actions', 'archive-data-loader') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($log_files)) : ?>
                    <?php foreach ($log_files as $file) : ?>
                        <tr>
                            <td><?php echo esc_html($file['name']); ?></td>
                            <td><?php echo esc_html(size_format($file['size'])); ?></td>
                            <td>
                                <a href="<?php echo esc_url(admin_url('admin.php?page=adl_plugin&adl_download_log=' . urlencode($file['name']))); ?>" class="button button-secondary"><?= __('Download', 'archive-data-loader') ?></a>
                                <form method="post" style="display:inline;">
                                    <?php wp_nonce_field('adl_delete_log', 'adl_delete_log_nonce'); ?>
                                    <input type="hidden" name="action" value="delete_log">
                                    <input type="hidden" name="file" value="<?php echo esc_attr($file['name']); ?>">
                                    <button type="submit" class="button button-danger"><?= __('Delete', 'archive-data-loader') ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3"><?= __('No log files available', 'archive-data-loader') ?>.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>