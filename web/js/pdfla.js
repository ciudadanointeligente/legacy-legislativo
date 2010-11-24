function fci_visualiza(id){
        for(var i=1; i<=3; i++){
                if(i==id){
                        document.getElementById('fci_marco'+i).style.display='block';
                }else{
                        document.getElementById('fci_marco'+i).style.display='none';
                }
        }
}
