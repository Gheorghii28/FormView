<?php if (isset($actionMenuItems) && is_array($actionMenuItems)): ?>
    <div id="<?php echo htmlspecialchars($triggerId); ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="<?php echo htmlspecialchars($ariaLabelledby); ?>">
            <?php foreach ($actionMenuItems as $item): ?>
                <li>
                    <button 
                        id="<?php echo htmlspecialchars($item['id']); ?>" 
                        <?php if (isset($item['action'])): ?>
                            data-action="<?php echo htmlspecialchars($item['action']); ?>"
                        <?php endif; ?>
                        class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <?php echo htmlspecialchars($item['label']); ?>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
