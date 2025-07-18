<footer class="footer text-center">
    <div>
        <p class="mb-0">
            Copyright &copy; <?= date('Y') ?>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                Jaspreet Gill
            <?php endif; ?>
        </p>
    </div>
</footer>

</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8n
