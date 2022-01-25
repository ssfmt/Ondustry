            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ondustry 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="js/functionsPHPadmin.js"></script>

        <script>window.onload = function() {
            
            //Vai buscar o id ao endereço da página
            var baseUrl = (window.location).href;
            var returnId = baseUrl.substring(baseUrl.lastIndexOf('/') + 1);

            if(returnId == 'index.php'){
                dashboardData();
            }else if(returnId == 'novaOportunidade.php'){
                selectTipo();
            }else if(returnId == 'oportunidadesAtivas.php'){
                tabelaOportunidades();
            }else if(returnId == 'historicoOportunidades.php'){
                tabelaHistorico();
            }else if(returnId == 'userProfile.php'){
                userProfile();
                selectSetorProfile();
                selectDistritoProfile();
            }else if(returnId == 'historicoBids.php'){
                tabelaBids();
            }else{
                detailOportunidade();
                tabelaBidsOportunidade();
                consultarPerfil();
                detailBids();    
            }
        };</script>

    </body>

</html>