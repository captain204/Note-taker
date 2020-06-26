<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="saveNote">
        <div class="form-group">
            <input type="text" wire:model="title"  class="form-control">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" wire:model="body" class="form-control">
            @error('body') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <button  type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
