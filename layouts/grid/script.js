const teamMemberDialog = document.getElementById("team-members-dialog");

if ( teamMemberDialog ) {
    const teamMemberOpenButtons = document.querySelectorAll(".team-member-open-drawer");
    const closeTeamMembersDialogButton = document.querySelector('.close-team-members-dialog')

    closeTeamMembersDialogButton.addEventListener('click', e => {
        e.preventDefault()

        teamMemberDialog.close()
    })

    teamMemberOpenButtons.forEach(button => {
        button.addEventListener('click', e => {
            console.log(e)
            e.preventDefault()

            let id = e.target.dataset.id;
            if (id) {
                let member = teamMemberDialog.querySelector('.team-member[data-id="' + id + '"]');
                member.classList.add("d-block");
            }

            teamMemberDialog.showModal()
        })
    })

    teamMemberDialog.addEventListener('close', e => {
        teamMemberDialog.querySelectorAll('.team-member').forEach(member => {
            member.classList.remove('d-block')
        })
    })

    teamMemberDialog.addEventListener('click', e => {
        const dialogDimensions = teamMemberDialog.getBoundingClientRect()
        if(
            e.clientX < dialogDimensions.left ||
            e.clientX > dialogDimensions.right ||
            e.clientY < dialogDimensions.top ||
            e.clientY > dialogDimensions.bottom
        ) {
            teamMemberDialog.close()
        }
    })
}