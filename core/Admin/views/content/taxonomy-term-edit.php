<?php
/**
 * Taxonomy Term Edit View
 * 
 * Available variables:
 * - $taxonomy: Taxonomy slug
 * - $term: Current term slug
 * - $termData: Term data from index (name, items, etc.)
 * - $rawTermData: Raw term data from YAML file (includes description)
 * - $config: Taxonomy configuration
 * - $error: Error message (if any)
 * - $csrf: CSRF token
 * - $site: Site configuration
 * - $admin_url: Admin base URL
 */

$termName = $termData['name'] ?? $term;
$description = $rawTermData['description'] ?? '';
$itemCount = count($termData['items'] ?? []);
?>

<div class="content-layout">
    <div class="card content-main">
        <div class="card-header">
            <span class="card-title">
                <span class="material-symbols-rounded">edit</span>
                Edit Term
            </span>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= htmlspecialchars($admin_url) ?>/taxonomy/<?= htmlspecialchars($taxonomy) ?>/<?= htmlspecialchars($term) ?>/edit">
                <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">
                
                <div class="form-group">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" required
                           placeholder="e.g., Getting Started"
                           value="<?= htmlspecialchars($_POST['name'] ?? $termName) ?>">
                    <p class="form-hint">The display name for this term.</p>
                </div>

                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" 
                           pattern="[a-z0-9-]+"
                           placeholder="e.g., getting-started"
                           value="<?= htmlspecialchars($_POST['slug'] ?? $term) ?>">
                    <p class="form-hint">URL-safe identifier. Lowercase letters, numbers, and hyphens only.</p>
                    <?php if ($itemCount > 0): ?>
                    <div class="alert alert-info mt-2">
                        <span class="material-symbols-rounded">info</span>
                        <div>
                            <strong>Note:</strong> Changing the slug will not update content files that reference this term. 
                            You'll need to update <?= $itemCount ?> content item<?= $itemCount !== 1 ? 's' : '' ?> manually.
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3"
                              placeholder="Optional description for this term..."><?= htmlspecialchars($_POST['description'] ?? $description) ?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-rounded">save</span>
                        Save Changes
                    </button>
                    <a href="<?= htmlspecialchars($admin_url) ?>/taxonomy/<?= htmlspecialchars($taxonomy) ?>" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="config-sidebar">
        <div class="card">
            <div class="card-header">
                <span class="card-title">
                    <span class="material-symbols-rounded">info</span>
                    Term Info
                </span>
            </div>
            <div class="card-body">
                <div class="list-item">
                    <span class="list-label">Current Slug</span>
                    <code class="text-xs"><?= htmlspecialchars($term) ?></code>
                </div>
                <div class="list-item">
                    <span class="list-label">Content Using</span>
                    <span class="badge <?= $itemCount > 0 ? 'badge-accent' : 'badge-muted' ?>"><?= $itemCount ?></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span class="card-title">
                    <span class="material-symbols-rounded">folder</span>
                    Storage
                </span>
            </div>
            <div class="card-body">
                <p class="text-sm text-secondary">
                    Terms are stored in:<br>
                    <code class="text-xs">content/_taxonomies/<?= htmlspecialchars($taxonomy) ?>.yml</code>
                </p>
            </div>
        </div>
    </div>
</div>
