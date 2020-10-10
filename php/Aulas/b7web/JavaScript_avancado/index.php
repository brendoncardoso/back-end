<script>

    /*
        - Criar Função 'Animal' e inserir objetos   
        - setTimeout
    */

    function Animal(){
        this.animal = "Cao",
        this.raca = "Vira-lata",
        this.nome = 'Dudu',
        this.idade = 200,
        this.peso = 10

        
        this.comer = function(c){
            for(x = 0; x < c; x++){
                console.log("Nhac...");
            }

            this.mastigar();
            this.calcComeu(c)
        }

        this.mastigar = function(){
            console.log("Hm...");
        }

        this.calcComeu = function(c){
            var calcKilos = this.peso + (2/c) + " kg";  
            console.log(calcKilos);
        }
    }

    cachorro = new Animal();
</script>