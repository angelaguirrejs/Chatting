<div class="h-screen flex overflow-hidden">
    @livewire('chat.chat-list')
    @livewire('chat.chatbox')

    <script>

        var objMain = document.getElementById('scrroll-bottom'); 

        window.addEventListener('chatSelected', event => {
            window.livewire.emit('updateHeight', {
                height: objMain.scrollHeight
            });
        });

        window.addEventListener('scrollChatBox', event => {
            objMain.scrollTop = objMain.scrollHeight;
        });
        
        window.addEventListener('updatedHeight', event => {

            let old = event.detail.height;

            let newHeight = objMain.scrollHeight

            let height = objMain.scrollTop = newHeight - old;

            window.loivewire.emit('updateHeight', {
                height: height
            });
        });

        objMain.addEventListener('scroll', event => {
            if(objMain.scrollTop == 0)
            {
                window.livewire.emit('loadMoreMessages');
            }
        });
    </script>
</div>