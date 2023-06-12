<div>
    <form method="post" wire:submit.prevent="SosyalOn()">
        <div class="form-group">
                <label for="exampleInputEmail1">Facebook</label>
                <input type="text" class="form-control"  placeholder="Facebook" wire:model="sosyal_facebook">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Twitter</label>
                <input type="text" class="form-control"  placeholder="Twitter" wire:model="sosyal_twitter">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">YouTube</label>
                <input type="text" class="form-control"  placeholder="YouTube" wire:model="sosyal_youtube">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Instagram</label>
                <input type="text" class="form-control"  placeholder="Instagram" wire:model="sosyal_instagram">

            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
