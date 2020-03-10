using System.ComponentModel.DataAnnotations;
namespace ProyectoContactos.Models
{
    [MetadataType(typeof(sp_select_all_id_ResultMetadata))]

    public partial class sp_select_all_id_Result { }

    public class sp_select_all_id_ResultMetadata

    {

        [Display(Name = "Codigo")]

        public int iD { get; set; }


        [Display(Name = "Nombre")]
        public string firstName { get; set; }


        [Display(Name = "Apellido")]
        public string lastName { get; set; }


        [Display(Name = "Pago")]
        public int feesPaid { get; set; }


        [Display(Name = "Genero")]
        public string gender { get; set; }


        [Display(Name = "Correo")]
        public string emailId { get; set; }


        [Display(Name = "Telefono")]
        public string telephoneNumber { get; set; }


        [Display(Name = "Fecha de nacimiento")]
        public System.DateTime dateOfBirth { get; set; }


        [Display(Name = "Esta activo")]
        public bool isActive { get; set; }


        [Display(Name = "Fecha de creacion")]
        public System.DateTime creationDate { get; set; }


        [Display(Name = "Fecha de modificacion")]
        public System.DateTime lastModifiedDate { get; set; }

    }
}