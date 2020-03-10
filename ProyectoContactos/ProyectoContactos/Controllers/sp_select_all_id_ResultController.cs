using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using ProyectoContactos.Models;

namespace ProyectoContactos.Controllers
{
    public class sp_select_all_id_ResultController : Controller
    {

        private TestEntities1 db = new TestEntities1();

        // GET: sp_select_all_id_Result
        public ActionResult Index()
        {
            var spmostrar = db.sp_select_all_id(null);
            return View(spmostrar.ToList());
        }

        // GET: sp_select_all_id_Result/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            sp_select_all_id_Result sp_select_all_id_Result = db.sp_select_all_id(id).FirstOrDefault();
            if (sp_select_all_id_Result == null)
            {
                return HttpNotFound();
            }
            return View(sp_select_all_id_Result);
        }

        // GET: sp_select_all_id_Result/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: sp_select_all_id_Result/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "iD,firstName,lastName,feesPaid,gender,emailId,telephoneNumber,dateOfBirth,isActive")] sp_select_all_id_Result sp_select_all_id_Result)
        {
            if (ModelState.IsValid)
            {
                //db.sp_select_all_id_Result.Add(sp_select_all_id_Result);
                db.sp_contacto_ins(
                sp_select_all_id_Result.firstName,
                sp_select_all_id_Result.lastName,
                sp_select_all_id_Result.feesPaid,
                sp_select_all_id_Result.gender,
                sp_select_all_id_Result.emailId,
                sp_select_all_id_Result.telephoneNumber,
                sp_select_all_id_Result.dateOfBirth,
                sp_select_all_id_Result.isActive
                );
                db.SaveChangesAsync();
                return RedirectToAction("Index");
            }

            return View(sp_select_all_id_Result);
        }

        // GET: sp_select_all_id_Result/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            sp_select_all_id_Result sp_select_all_id_Result = db.sp_select_all_id(id).FirstOrDefault();
            if (sp_select_all_id_Result == null)
            {
                return HttpNotFound();
            }
            return View(sp_select_all_id_Result);
        }

        // POST: sp_select_all_id_Result/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "iD,firstName,lastName,feesPaid,gender,emailId,telephoneNumber,dateOfBirth,isActive,creationDate,lastModifiedDate")] sp_select_all_id_Result sp_select_all_id_Result)
        {
            if (ModelState.IsValid)
            {
                //db.Entry(sp_select_all_id_Result).State = EntityState.Modified;
                db.sp_contacto_upd(
                    sp_select_all_id_Result.iD, 
                    sp_select_all_id_Result.firstName,
                    sp_select_all_id_Result.lastName,
                    sp_select_all_id_Result.feesPaid,
                    sp_select_all_id_Result.gender,
                    sp_select_all_id_Result.emailId,
                    sp_select_all_id_Result.telephoneNumber,
                    sp_select_all_id_Result.dateOfBirth,
                    sp_select_all_id_Result.isActive
                    );
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(sp_select_all_id_Result);
        }

        // GET: sp_select_all_id_Result/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            sp_select_all_id_Result sp_select_all_id_Result = db.sp_select_all_id(id).FirstOrDefault();
            if (sp_select_all_id_Result == null)
            {
                return HttpNotFound();
            }
            return View(sp_select_all_id_Result);
        }

        // POST: sp_select_all_id_Result/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            sp_select_all_id_Result sp_select_all_id_Result = db.sp_select_all_id(id).FirstOrDefault();
            db.sp_contacto_del(id);
            db.SaveChangesAsync();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
