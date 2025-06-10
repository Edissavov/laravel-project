<div class="flex justify-center items-center mt-20">
   <form wire:submit="submit" class="flex flex-col ">
  <label for="names">First name:</label>
  <input class="border" type="text" id="names" name="names" wire:model='names'>
    <div class="text-red-500">@error('names') {{ $message }} @enderror</div>
  <label for="email">Email:</label>
  <input class="border" type="email" id="email" name="email" wire:model='email'>

  <button type="submit" class="border mt-2 cursor-pointer rounded-lg hover:text-green-500">Submit</button>
</form>
</div>
