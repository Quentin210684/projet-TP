var tabEl = document.querySelectorAll('button[data-bs-toggle="tab"]')


tabEl.addEventListener('shown.bs.tab', function(event) {
    const activated_pane = document.querySelector(event.target.getAttribute('data-bs-target'))
    const deactivated_pane = document.querySelector(event.relatedTarget.getAttribute('data-bs-target'))


    activated_pane.append(activated_pane.id)

})