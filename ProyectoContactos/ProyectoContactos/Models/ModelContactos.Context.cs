﻿//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated from a template.
//
//     Manual changes to this file may cause unexpected behavior in your application.
//     Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace ProyectoContactos.Models
{
    using System;
    using System.Data.Entity;
    using System.Data.Entity.Infrastructure;
    using System.Data.Entity.Core.Objects;
    using System.Linq;
    
    public partial class TestEntities1 : DbContext
    {
        public TestEntities1()
            : base("name=TestEntities1")
        {
        }
    
        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            throw new UnintentionalCodeFirstException();
        }
    
    
        public virtual int sp_contacto_del(Nullable<int> id)
        {
            var idParameter = id.HasValue ?
                new ObjectParameter("id", id) :
                new ObjectParameter("id", typeof(int));
    
            return ((IObjectContextAdapter)this).ObjectContext.ExecuteFunction("sp_contacto_del", idParameter);
        }
    
        public virtual int sp_contacto_ins(string firstName, string lastName, Nullable<int> feesPaid, string gender, string emailId, string telephoneNumber, Nullable<System.DateTime> dateOfBirth, Nullable<bool> isActive)
        {
            var firstNameParameter = firstName != null ?
                new ObjectParameter("firstName", firstName) :
                new ObjectParameter("firstName", typeof(string));
    
            var lastNameParameter = lastName != null ?
                new ObjectParameter("lastName", lastName) :
                new ObjectParameter("lastName", typeof(string));
    
            var feesPaidParameter = feesPaid.HasValue ?
                new ObjectParameter("feesPaid", feesPaid) :
                new ObjectParameter("feesPaid", typeof(int));
    
            var genderParameter = gender != null ?
                new ObjectParameter("gender", gender) :
                new ObjectParameter("gender", typeof(string));
    
            var emailIdParameter = emailId != null ?
                new ObjectParameter("emailId", emailId) :
                new ObjectParameter("emailId", typeof(string));
    
            var telephoneNumberParameter = telephoneNumber != null ?
                new ObjectParameter("telephoneNumber", telephoneNumber) :
                new ObjectParameter("telephoneNumber", typeof(string));
    
            var dateOfBirthParameter = dateOfBirth.HasValue ?
                new ObjectParameter("dateOfBirth", dateOfBirth) :
                new ObjectParameter("dateOfBirth", typeof(System.DateTime));
    
            var isActiveParameter = isActive.HasValue ?
                new ObjectParameter("isActive", isActive) :
                new ObjectParameter("isActive", typeof(bool));
    
            return ((IObjectContextAdapter)this).ObjectContext.ExecuteFunction("sp_contacto_ins", firstNameParameter, lastNameParameter, feesPaidParameter, genderParameter, emailIdParameter, telephoneNumberParameter, dateOfBirthParameter, isActiveParameter);
        }
    
        public virtual int sp_contacto_upd(Nullable<int> id, string firstName, string lastName, Nullable<int> feesPaid, string gender, string emailId, string telephoneNumber, Nullable<System.DateTime> dateOfBirth, Nullable<bool> isActive)
        {
            var idParameter = id.HasValue ?
                new ObjectParameter("id", id) :
                new ObjectParameter("id", typeof(int));
    
            var firstNameParameter = firstName != null ?
                new ObjectParameter("firstName", firstName) :
                new ObjectParameter("firstName", typeof(string));
    
            var lastNameParameter = lastName != null ?
                new ObjectParameter("lastName", lastName) :
                new ObjectParameter("lastName", typeof(string));
    
            var feesPaidParameter = feesPaid.HasValue ?
                new ObjectParameter("feesPaid", feesPaid) :
                new ObjectParameter("feesPaid", typeof(int));
    
            var genderParameter = gender != null ?
                new ObjectParameter("gender", gender) :
                new ObjectParameter("gender", typeof(string));
    
            var emailIdParameter = emailId != null ?
                new ObjectParameter("emailId", emailId) :
                new ObjectParameter("emailId", typeof(string));
    
            var telephoneNumberParameter = telephoneNumber != null ?
                new ObjectParameter("telephoneNumber", telephoneNumber) :
                new ObjectParameter("telephoneNumber", typeof(string));
    
            var dateOfBirthParameter = dateOfBirth.HasValue ?
                new ObjectParameter("dateOfBirth", dateOfBirth) :
                new ObjectParameter("dateOfBirth", typeof(System.DateTime));
    
            var isActiveParameter = isActive.HasValue ?
                new ObjectParameter("isActive", isActive) :
                new ObjectParameter("isActive", typeof(bool));
    
            return ((IObjectContextAdapter)this).ObjectContext.ExecuteFunction("sp_contacto_upd", idParameter, firstNameParameter, lastNameParameter, feesPaidParameter, genderParameter, emailIdParameter, telephoneNumberParameter, dateOfBirthParameter, isActiveParameter);
        }
    
        public virtual ObjectResult<sp_select_all_id_Result> sp_select_all_id(Nullable<int> id)
        {
            var idParameter = id.HasValue ?
                new ObjectParameter("id", id) :
                new ObjectParameter("id", typeof(int));
    
            return ((IObjectContextAdapter)this).ObjectContext.ExecuteFunction<sp_select_all_id_Result>("sp_select_all_id", idParameter);
        }

        public System.Data.Entity.DbSet<ProyectoContactos.Models.sp_select_all_id_Result> sp_select_all_id_Result { get; set; }
    }
}
